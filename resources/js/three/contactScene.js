import * as THREE from 'three';
import { makeParticles } from './core';

/**
 * Contact section — a large, gentle sphere of soft light points that
 * breathes slowly behind the pitch/form. Very low-key on light bg.
 */
export default function contactScene() {
    return (ctx) => {
        const { scene, camera, renderer, isMobile } = ctx;

        camera.position.set(0, 0, isMobile ? 8.5 : 7);
        camera.lookAt(0, 0, 0);

        const points = makeParticles({
            count: isMobile ? 180 : 380,
            radius: 3.4,
            size: 0.05,
            colors: ['#5b5bff', '#a78bfa', '#22d3ee'],
            uniform: true,
        });
        points.material.opacity = 0.5;
        scene.add(points);

        scene.add(new THREE.AmbientLight(0xffffff, 0.6));
        const rim = new THREE.PointLight(0x8b5cf6, 0.8, 22);
        rim.position.set(-4, 2, 6);
        scene.add(rim);

        const base = points.userData.base || points.geometry.attributes.position.array;

        return {
            animate(sceneObj, _dt, t) {
                const posAttr = points.geometry.attributes.position;
                const arr = posAttr.array;
                const count = arr.length / 3;

                for (let i = 0; i < count; i++) {
                    const bX = base[i * 3];
                    const bY = base[i * 3 + 1];
                    const bZ = base[i * 3 + 2];
                    // Gentle vertical wave.
                    arr[i * 3 + 1] = bY + Math.sin(t * 0.7 + bX * 0.5 + bZ * 0.3) * 0.2;
                }
                posAttr.needsUpdate = true;

                points.rotation.y += 0.0005;
                points.rotation.x += 0.0002;
                renderer.render(sceneObj, camera);
            },
        };
    };
}