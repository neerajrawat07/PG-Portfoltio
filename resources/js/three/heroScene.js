import * as THREE from 'three';
import { makeParticles } from './core';

/**
 * Hero scene — an elegant abstract object for a light canvas:
 * translucent white wireframe core, soft blue/violet rings and a
 * sparse, low-opacity particle field. Responds subtly to the mouse
 * and sits behind the portrait, never dominating it.
 */
export default function heroScene() {
    return (ctx) => {
        const { scene, camera, renderer, isMobile } = ctx;
        camera.position.set(0, 0, isMobile ? 9.5 : 8.5);
        camera.lookAt(0, 0, 0);

        const group = new THREE.Group();
        scene.add(group);

        // Core: translucent white wireframe icosahedron, faint blue-ish.
        const core = new THREE.Mesh(
            new THREE.IcosahedronGeometry(1.7, isMobile ? 1 : 2),
            new THREE.MeshStandardMaterial({
                color: 0xaab3ff,
                wireframe: true,
                emissive: 0x8b5cf6,
                emissiveIntensity: 0.25,
                transparent: true,
                opacity: 0.32,
            })
        );
        group.add(core);

        // Inner soft glow sphere — very faint light field.
        const glow = new THREE.Mesh(
            new THREE.IcosahedronGeometry(1.02, 2),
            new THREE.MeshBasicMaterial({
                color: 0x5b5bff,
                transparent: true,
                opacity: 0.07,
                blending: THREE.AdditiveBlending,
                wireframe: true,
            })
        );
        group.add(glow);

        // Two thin orbital rings, accent colors.
        const ringA = new THREE.Mesh(
            new THREE.TorusGeometry(2.7, 0.012, 8, 90),
            new THREE.MeshBasicMaterial({ color: 0x06b6d4, transparent: true, opacity: 0.25 })
        );
        ringA.rotation.x = Math.PI / 2.4;
        group.add(ringA);

        const ringB = new THREE.Mesh(
            new THREE.TorusGeometry(3.3, 0.01, 8, 90),
            new THREE.MeshBasicMaterial({ color: 0x8b5cf6, transparent: true, opacity: 0.2 })
        );
        ringB.rotation.x = Math.PI / 1.9;
        ringB.rotation.y = 0.6;
        group.add(ringB);

        // Sparse particle field.
        const points = makeParticles({
            count: isMobile ? 160 : 340,
            radius: 5.6,
            size: 0.05,
            colors: ['#5b5bff', '#a78bfa', '#22d3ee'],
        });
        points.material.opacity = 0.55;
        group.add(points);

        // Ambient + a soft violet fill light.
        scene.add(new THREE.AmbientLight(0xffffff, 0.6));
        const fill = new THREE.PointLight(0x8b5cf6, 0.9, 26);
        fill.position.set(5, 3, 5);
        scene.add(fill);

        // Mouse parallax.
        let mx = 0, my = 0, tx = 0, ty = 0;
        if (!isMobile) {
            window.addEventListener('mousemove', (e) => {
                tx = (e.clientX / window.innerWidth - 0.5);
                ty = (e.clientY / window.innerHeight - 0.5);
            }, { passive: true });
        }

        return {
            animate(_, _dt, t) {
                mx += (tx - mx) * 0.04;
                my += (ty - my) * 0.04;

                core.rotation.y += 0.003;
                core.rotation.x += 0.0012;
                glow.rotation.y = -core.rotation.y * 0.7;
                glow.rotation.z += 0.002;

                ringA.rotation.z += 0.0016;
                ringB.rotation.z -= 0.0012;
                points.rotation.y += 0.0005;

                group.position.y = Math.sin(t * 0.5) * 0.14;
                group.rotation.y += 0.0008;
                group.rotation.x = my * 0.14;
                group.rotation.z = mx * 0.1;

                renderer.render(scene, camera);
            },
            dispose() {
                window.removeEventListener('mousemove', () => {});
            },
        };
    };
}