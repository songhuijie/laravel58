<style>
    html, body {
        margin: 0;
        /*padding: 10%;*/
        height: 100%;
        overflow: hidden;
    }
    #box1{
        width: 40%;
    }
    #box2{
        width: 40%;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/84/three.min.js"></script>
<div>
    <div id="box1">
        <div id="container"></div>

    </div>
    <div id="box2">
        <div id="container2"></div>
    </div>

</div>




<script>
    /*------------------------------
Map
------------------------------*/
    const map = (value, x1, y1, x2, y2) => (value - x1) * (y2 - x2) / (y1 - x1) + x2;


    /*------------------------------
      Mouse
     ------------------------------*/
    const mouse = {
        x: 0,
        y: 0 };

    window.addEventListener('mousemove', e => {
        mouse.x = e.clientX;
        mouse.y = e.clientY;
    });
    window.addEventListener('touchstart', e => {
        mouse.x = e.touches[0].clientX;
        mouse.y = e.touches[0].clientY;
    });


    /*------------------------------
        GLSL TEMPLATE
        ------------------------------*/
    class GLSLTemplate {
        constructor(opt) {
            Object.assign(this, opt);

            this.loadImages();
        }


        /*------------------------------
          Load Image
          ------------------------------*/
        loadImages() {
            this.textures = [];
            let loadedImages = 0;

            // loop images
            for (let i = 0; i < this.images.length; i++) {
                const textureLoader = new THREE.TextureLoader();
                textureLoader.crossOrigin = '';
                textureLoader.load(this.images[i], img => {
                    img.magFilter = THREE.NearestFilter;
                    this.textures.push({ texture: img });
                    this.checkLoadedImages();
                });
            }
        }

        /*------------------------------
          Check Load Images
          ------------------------------*/
        checkLoadedImages() {
            if (this.textures.length === this.images.length) {
                this.setTexturesRatio();
                this.setup();
            }
        }


        /*------------------------------
          Set Textures Ratio
          ------------------------------*/
        setTexturesRatio() {
            this.winRatio = window.innerWidth / window.innerHeight;
            console.log(this.winRatio);
            for (let i = 0; i < this.textures.length; i++) {
                const t = this.textures[i];
                const textureRatio = t.texture.image.naturalWidth / t.texture.image.naturalHeight;
                t.ratio = this.winRatio > textureRatio ? new THREE.Vector2(1.0, textureRatio / this.winRatio) : new THREE.Vector2(this.winRatio / textureRatio, 1.0);
            }
        }


        /*------------------------------
          Setup
          ------------------------------*/
        setup() {
            this.uniforms = {
                time: { type: "f", value: 1.0 },
                resolution: { type: "v2", value: new THREE.Vector2() },
                u_mouse: { type: "v2", value: new THREE.Vector2(0, 0) },
                texture_0: { type: "t", value: this.textures[0].texture },
                ratio_0: { type: "v2", value: this.textures[0].ratio },
                texture_1: { type: "t", value: this.textures[1].texture },
                ratio_1: { type: "v2", value: this.textures[1].ratio } };

            this.vertexShader = `
			void main() {
				gl_Position = vec4(position, 1.0);
			  }
		`;
            this.fragmentShader = `
			uniform vec2 resolution;
			uniform float time;
      uniform vec2 u_mouse;
      uniform sampler2D texture_0;
      uniform sampler2D texture_1;
      uniform vec2 ratio_0;
      uniform vec2 ratio_1;

			void main(){

				vec2 uv = gl_FragCoord.xy / resolution.xy;

        // IMAGE 0
        vec2 ratio_image_0 = uv * ratio_0;
        if (ratio_0.x < 1.) {
          ratio_image_0.x += ((1. - ratio_0.x) / 2.);
        }
        if (ratio_0.y < 1.) {
          ratio_image_0.y += ((1. - ratio_0.y) / 2.);
        }
        vec4 image_0 = texture2D(texture_0, ratio_image_0);


        // IMAGE 1
        vec2 ratio_image_1 = uv * ratio_1;
        if (ratio_1.x < 1.) {
          ratio_image_1.x += ((1. - ratio_1.x) / 2.);
        }
        if (ratio_1.y < 1.) {
          ratio_image_1.y += ((1. - ratio_1.y) / 2.);
        }
        vec4 image_1 = texture2D(texture_1, ratio_image_1);


        // SLIDE PROGRESS
        float slideProgress = u_mouse.y;
        float colorProgress = uv.y + slideProgress;
        colorProgress = slideProgress * 4.8 - uv.y * 3. + uv.x * 0.8 - 0.8;
        colorProgress = clamp(colorProgress, 0., 1.);


				// gl_FragColor = vec4(vec3(colorProgress), 0.0);
        // gl_FragColor = image_1;
        gl_FragColor = mix(image_0,image_1,colorProgress);
			}
		`;

            this.startTime = Date.now();
            this.camera = new THREE.Camera();
            this.scene = new THREE.Scene();

            this.init();
        }


        /*------------------------------
          Init
          ------------------------------*/
        init() {
            this.camera.position.z = 1;
            this.geometry = new THREE.PlaneBufferGeometry(16, 9);
            this.material = new THREE.ShaderMaterial({
                uniforms: this.uniforms,
                vertexShader: this.vertexShader,
                fragmentShader: this.fragmentShader });


            this.mesh = new THREE.Mesh(this.geometry, this.material);
            this.scene.add(this.mesh);
            this.renderer = new THREE.WebGLRenderer();
            this.container.appendChild(this.renderer.domElement);

            this.resize();
            this.render();
            this.events();
        }


        /*------------------------------
          Events
          ------------------------------*/
        events() {
            window.addEventListener('resize', this.resize.bind(this), false);
        }


        /*------------------------------
          Resize
          ------------------------------*/
        resize() {
            this.setTexturesRatio();
            this.uniforms.resolution.value.x = window.innerWidth;
            this.uniforms.resolution.value.y = window.innerHeight;
            this.uniforms.ratio_0.value = this.textures[0].ratio;
            this.uniforms.ratio_1.value = this.textures[1].ratio;
            this.renderer.setSize(window.innerWidth, window.innerHeight);
        }


        /*------------------------------
          Render
          ------------------------------*/
        render() {
            this.currentTime = Date.now();
            this.elaspedSeconds = (this.currentTime - this.startTime) / 1000.0;
            this.uniforms.time.value = this.elaspedSeconds;
            this.uniforms.u_mouse.value.x = map(mouse.x, 0, window.innerWidth, 0, 1);
            this.uniforms.u_mouse.value.y = map(mouse.y, 0, window.innerHeight, 1, 0);

            this.renderer.render(this.scene, this.camera);
            this.RaF = requestAnimationFrame(this.render.bind(this));
        }}



    /*------------------------------
         Initialize
         ------------------------------*/
    const shader = new GLSLTemplate({
        container: document.getElementById('container'),
        images: [
            'https://images.unsplash.com/photo-1418386767268-77cdab4edcaa?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjI0MX0&auto=format&fit=crop&w=1920&q=90',
            'https://images.unsplash.com/photo-1474433188271-d3f339f41911?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjI0MX0&auto=format&fit=crop&w=1920&q=90'] });

    const shader2 = new GLSLTemplate({
        container: document.getElementById('container2'),
        images: [
            'https://images.unsplash.com/photo-1418386767268-77cdab4edcaa?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjI0MX0&auto=format&fit=crop&w=1920&q=90',
            'https://images.unsplash.com/photo-1474433188271-d3f339f41911?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjI0MX0&auto=format&fit=crop&w=1920&q=90'] });
</script>
