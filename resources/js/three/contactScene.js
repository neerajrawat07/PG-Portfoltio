import * as THREE from 'three';
import { makeParticles } from './core';

/**
 * Contact section — a breathing sphere of soft light points at center,
 * orbited by glowing 3D primitives (torus rings, octahedrons, spheres)
 * that evoke charts, signals and creative energy — i.e. the visual
 * language of social media marketing. Slow, low-key, desktop friendly.
 */
export default function contactScene() {
    return (ctx) => {
        const { scene, camera, renderer, isMobile } = ctx;

        camera.position.set(0, 0, isMobile ? 8.5 : 7.6);
        camera.lookAt(0, 0, 0);

        /* ---- Central particle sphere ---- */
        const points = makeParticles({
            count: isMobile ? 160 : 360,
            radius: isMobile ? 2.4 : 3.2,
            size: 0.05,
            colors: ['#5b5bff', '#a78bfa', '#22d3ee'],
            uniform: true,
        });
        points.material.opacity = 0.75;
        scene.add(points);
        const base = points.userData.base || points.geometry.attributes.position.array;

        /* ---- Orbiting 3D primitives ---- */
        const group = new THREE.Group();
        scene.add(group);

        const glows = ['#5b5bff', '#8b5cf6', '#06b6d4'];
        const builds = isMobile
            ? [
                  { make: () => new THREE.TorusGeometry(0.55, 0.045, 16, 64), r: 2.9, y: 0.4, speed: 0.35 },
                  { make: () => new THREE.OctahedronGeometry(0.45), r: 3.2, y: -0.5, speed: -0.3 },
              ]
            : [
                  { make: () => new THREE.TorusGeometry(0.75, 0.05, 18, 80), r: 4.2, y: 1.1, speed: 0.35 },
                  { make: () => new THREE.OctahedronGeometry(0.55), r: 4.4, y: -1.3, speed: -0.3 },
                  { make: () => new THREE.IcosahedronGeometry(0.42), r: 5.1, y: 0.6, speed: 0.26 },
                  { make: () => new THREE.TorusGeometry(0.95, 0.035, 14, 90), r: 5.4, y: -0.9, speed: -0.22 },
                  { make: () => new THREE.SphereGeometry(0.4, 24, 24), r: 6.0, y: 1.4, speed: 0.32 },
              ];

        const orbs = builds.map(({ make, r, y, speed }, i) => {
            const geo = make();
            const tint = glows[i % glows.length];
            const mat = new THREE.MeshBasicMaterial({
                wireframe: true,
                color: tint,
                transparent: true,
                opacity: 0.7,
            });
            const mesh = new THREE.Mesh(geo, mat);
            const ang = (i / builds.length) * Math.PI * 2;
            const rise = y + Math.sin(i * 1.7) * 0.6;
            mesh.position.set(Math.cos(ang) * r, rise, Math.sin(ang) * r * 0.35);
            mesh.userData = { speed, ang, r, rise };
            group.add(mesh);
            return mesh;
        });

        /* ---- Fill light for a soft, consistent glow ---- */
        scene.add(new THREE.AmbientLight(0xffffff, 0.6));
        const rim = new THREE.PointLight(0x8b5cf6, 0.8, 22);
        rim.position.set(-4, 2, 6);
        scene.add(rim);

        return {
            animate(sceneObj, _dt, t) {
                // Breathing particle wave.
                const posAttr = points.geometry.attributes.position;
                const arr = posAttr.array;
                const count = arr.length / 3;
                for (let i = 0; i < count; i++) {
                    const bX = base[i * 3];
                    const bY = base[i * 3 + 1];
                    const bZ = base[i * 3 + 2];
                    arr[i * 3 + 1] = bY + Math.sin(t * 0.7 + bX * 0.5 + bZ * 0.3) * 0.2;
                }
                posAttr.needsUpdate = true;

                points.rotation.y += 0.0005;
                points.rotation.x += 0.0002;

                // Orbit the floating primitives around the center.
                for (const m of orbs) {
                    const { speed, ang, r, rise } = m.userData;
                    m.userData.ang = ang + t * speed * 0.4;
                    const a = m.userData.ang;
                    m.position.set(
                        Math.cos(a) * r,
                        rise + Math.sin(t * 0.8 + m.userData.r) * 0.25,
                        Math.sin(a) * r * 0.35
                    );
                    m.rotation.x += 0.004;
                    m.rotation.y += 0.006;
                }

                renderer.render(sceneObj, camera);
            },
        };
    };
}