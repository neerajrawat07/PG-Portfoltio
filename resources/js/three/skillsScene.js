import * as THREE from 'three';

/**
 * Skills section — sparse floating translucent wireframe solids,
 * very subtle so they never compete with the bars/meters.
 */
export default function skillsScene() {
    return (ctx) => {
        const { scene, camera, renderer, isMobile } = ctx;

        const group = new THREE.Group();
        scene.add(group);

        const shapes = [
            { geo: () => new THREE.IcosahedronGeometry(0.42, 0), color: 0x06b6d4, pos: [3.2, 1.4, -2], speed: 0.12 },
            { geo: () => new THREE.OctahedronGeometry(0.34, 0), color: 0x8b5cf6, pos: [-3.4, -0.6, -2.5], speed: 0.09 },
            { geo: () => new THREE.DodecahedronGeometry(0.3, 0), color: 0x5b5bff, pos: [2.6, -2.6, -1.5], speed: 0.15 },
            { geo: () => new THREE.TorusGeometry(0.34, 0.05, 8, 30), color: 0xf43f8e, pos: [-2.8, 2.2, -2], speed: 0.1 },
        ];

        if (isMobile) {
            shapes.length = 2;
        }

        const solids = shapes.map(({ geo, color, pos, speed }) => {
            const mesh = new THREE.Mesh(
                geo(),
                new THREE.MeshStandardMaterial({
                    color, wireframe: true, transparent: true, opacity: 0.18,
                    emissive: color, emissiveIntensity: 0.2,
                })
            );
            mesh.position.set(...pos);
            mesh.userData = { speed, baseY: pos[1] };
            group.add(mesh);
            return mesh;
        });

        scene.add(new THREE.AmbientLight(0xffffff, 0.7));

        camera.position.set(0, 0, isMobile ? 10 : 9);
        camera.lookAt(0, 0, 0);

        let t = 0;
        return {
            animate() {
                t += 0.01;
                solids.forEach((m) => {
                    m.rotation.x += m.userData.speed * 0.01;
                    m.rotation.y += m.userData.speed * 0.014;
                    m.position.y = m.userData.baseY + Math.sin(t * 1.4 + m.userData.baseY) * 0.25;
                });
                group.rotation.y += 0.0006;
                renderer.render(scene, camera);
            },
        };
    };
}