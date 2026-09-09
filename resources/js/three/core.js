import * as THREE from 'three';

/**
 * Lightweight Three.js runner:
 *  - only mounts when its container is in view (lazy)
 *  - pauses rendering when off-screen, tears down when unmounted
 *  - clamps DPR for performance, disables itself for reduced motion
 *
 * Each scene is a plain object: { build(scene), animate(scene, dt, t) }.
 * Returns { stop() } to detach.
 */
export function mountScene(container, make, { mobileQuality = 0.6 } = {}) {
    if (!container || container.dataset.mounted) return null;

    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduced) return null;

    const isMobile = window.matchMedia('(max-width: 767px)').matches;

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(50, 1, 0.1, 100);
    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: !isMobile, powerPreference: 'high-performance' });
    renderer.setClearColor(0x000000, 0);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, isMobile ? 1.5 : 2) * (isMobile ? mobileQuality : 1));

    let width = 0;
    let height = 0;

    const resize = () => {
        const rect = container.getBoundingClientRect();
        if (rect.width === 0 || rect.height === 0) return;
        width = rect.width;
        height = rect.height;
        renderer.setSize(width, height, false);
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
    };

    const ctx = make({ scene, camera, renderer, isMobile });
    if (!ctx) { renderer.dispose(); return null; }

    ctx.containers = [container];
    container.style.position = 'absolute';
    container.appendChild(renderer.domElement);
    resize();

    const clock = new THREE.Clock();
    let visible = false;
    let raf = null;
    let sceneHandle = null;

    const tick = () => {
        if (!visible) return;
        const dt = clock.getDelta();
        const t = clock.elapsedTime;
        ctx.animate?.(scene, dt, t, camera);
        renderer.render(scene, camera);
        raf = requestAnimationFrame(tick);
    };

    const io = new IntersectionObserver(
        (entries) => {
            const entry = entries[0];
            if (entry.isIntersecting && !visible) {
                visible = true;
                sceneHandle = entry.target;
                resize();
                raf = requestAnimationFrame(tick);
            } else if (!entry.isIntersecting) {
                visible = false;
                if (raf) cancelAnimationFrame(raf);
            }
        },
        { threshold: 0.08 }
    );
    io.observe(container);

    window.addEventListener('resize', resize);

    return {
        stop() {
            io.disconnect();
            window.removeEventListener('resize', resize);
            if (raf) cancelAnimationFrame(raf);
            ctx.dispose?.();
            renderer.dispose();
            container.removeChild(renderer.domElement);
            container.dataset.mounted = '';
        },
    };
}

/** Shared: soft additive point cloud. */
export function makeParticles({ count = 350, radius = 6, size = 0.05, colors = ['#5b8cff', '#8b3dff', '#22d3ee'], uniform = false }) {
    const palette = colors.map((c) => new THREE.Color(c));
    const positions = new Float32Array(count * 3);
    const cArray = new Float32Array(count * 3);

    for (let i = 0; i < count; i++) {
        const r = radius * Math.pow(Math.random(), uniform ? 0.5 : 1);
        const theta = Math.random() * Math.PI * 2;
        const phi = Math.acos(2 * Math.random() - 1);
        positions[i * 3] = r * Math.sin(phi) * Math.cos(theta);
        positions[i * 3 + 1] = r * Math.sin(phi) * Math.sin(theta);
        positions[i * 3 + 2] = r * Math.cos(phi);
        const col = palette[i % palette.length];
        cArray[i * 3] = col.r;
        cArray[i * 3 + 1] = col.g;
        cArray[i * 3 + 2] = col.b;
    }

    const geo = new THREE.BufferGeometry();
    geo.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    geo.setAttribute('color', new THREE.BufferAttribute(cArray, 3));

    const mat = new THREE.PointsMaterial({
        size, vertexColors: true, transparent: true, opacity: 0.85, blending: THREE.AdditiveBlending, depthWrite: false,
    });
    const points = new THREE.Points(geo, mat);
    points.userData.base = positions.slice();
    return points;
}