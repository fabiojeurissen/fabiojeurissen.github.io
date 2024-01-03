import * as THREE from "../three/three.module.js";
import { MapControls } from "../three/controls/OrbitControls.js"

class Screen {
    constructor() {
        this.scene = new THREE.Scene();
        this.camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 0.1, 1000);
        this.renderer = new THREE.WebGLRenderer();

        this.initRenderer();

        this.controls = new MapControls(this.camera, this.renderer.domElement);
        this.controls.target.set(0, 0, 0);
        this.controls.update();
    }

    initRenderer() {
        this.renderer.setSize(window.innerWidth, window.innerHeight);
        document.body.appendChild(this.renderer.domElement);

        const map = new Map(10);

        for (const x in map.tiles) {
            for (const z in map.tiles[x]) {
                const tile = map.tiles[x][z];
                this.scene.add(tile.getMesh());

                const edges = new THREE.EdgesGeometry(tile.getMesh().geometry);
                const outline = new THREE.LineSegments(edges, new THREE.LineBasicMaterial( { color: 0xffffff, linewidth: 20 } ) );
                outline.position.x = tile.coordinates.x;
                outline.position.y = tile.coordinates.y;
                outline.position.z = tile.coordinates.z;
                this.scene.add(outline);
            }
        }
    }

    animate() {
        requestAnimationFrame(this.animate.bind(this));

        this.update();

        this.renderer.render(this.scene, this.camera);
    }

    update() {

    }
}

class Map {
    constructor(size) {
        this.tiles = [];
        for (const x of Array(size).keys()) {
            if (!this.tiles.hasOwnProperty(x)) {
                this.tiles[x] = [];
            }

            for (const z of Array(size).keys()) {
                this.tiles[x][z] = new Tile(x, z);
            }
        }
    }
}

class Tile {
    constructor(x, z) {
        this.coordinates = new THREE.Vector3(x, Math.random(), z);

        this.mesh = new THREE.Mesh(new THREE.BoxGeometry(1, 1, 1), new THREE.MeshBasicMaterial( { color : (x + z) % 2 ? 0xff0000 : 0x00ff00 } ));
        this.mesh.position.set(this.coordinates.x, this.coordinates.y, this.coordinates.z);
        this.mesh.receiveShadow = true;
    }

    getMesh() {
        return this.mesh;
    }
}

window.screen = new Screen();

screen.camera.position.x = 5;
screen.camera.position.y = 10;
screen.camera.position.z = 20;

/*window.oncontextmenu = function() { return false; }
document.addEventListener('click', async function() {
    cubeColor = await sendRequest();
});

async function sendRequest() {
    return new Promise(resolve => {
        const request = new XMLHttpRequest();
        request.open('GET', '//localhost:3000', true);
        request.send();

        request.onreadystatechange = () => {
            if (4 === request.readyState && 200 === request.status) {
                resolve(request.responseText);
            }
        }
    });
}*/

screen.animate();
