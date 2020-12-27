<template>
    <div>
        <div class="ms-section-head ms-type2">
            <h3 class="ms-section-title">{{ item.name }}</h3>
        </div>
        <div class="ms-card ms-style2">
            <div class="ms-card-left">

                <div class="ms-illustration-slider ms-infinity">
                    <input type="radio" name="slides" checked="checked" id="ms-slide1">
                    <input type="radio" name="slides" id="ms-slide2">
                    <input type="radio" name="slides" id="ms-slide3">
                    <ul>
                        <li>
                            <div class="ms-editable-box">
                                <div class="ms-editable-img" :style="{backgroundColor: backgroundColor? backgroundColor: 'transparent'}">
                                    <canvas id="canvas" :width="item.width" :height="item.height"></canvas>
                                </div>
                                <div class="ms-watter-mark">
                                    <svg width="593" height="288" viewBox="0 0 593 288" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M545.308 0H47.6923C21.4489 0 0 21.8618 0 48.96V187.593C0 221.105 16.276 252.393 43.4026 270.982C59.6785 282.109 78.604 288 98.1604 288C110.904 288 123.394 285.513 135.254 280.538L152.161 273.469L296.5 213.251L457.746 280.538C469.606 285.513 482.096 288 494.84 288C514.396 288 533.322 282.109 549.597 270.982C563.224 261.687 574.074 249.251 581.519 234.851C588.963 220.582 593 204.349 593 187.593V48.96C593 21.8618 571.551 0 545.308 0ZM118.348 237.731C111.661 240.48 104.847 241.92 97.9081 241.92C87.5621 241.92 77.4685 238.647 68.5104 232.495C53.4962 222.284 45.0428 205.92 45.0428 187.593V108.262L236.695 188.378L118.348 237.731ZM547.957 187.593C547.957 205.92 539.504 222.284 524.49 232.625C515.531 238.778 505.312 241.92 494.966 241.92C488.153 241.92 481.339 240.611 474.652 237.862L356.305 188.378L547.957 108.262V187.593ZM547.957 58.5164L296.5 163.375L45.0428 58.5164V48.96C45.0428 47.52 46.1783 46.2109 47.6923 46.2109H545.308C546.822 46.2109 547.957 47.3891 547.957 48.96V58.5164Z" fill="black" fill-opacity="0.04"></path></svg>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
                <div class="ms-editable-box-desc">
                    <p>Get free collaboration vector illustration in grain style for web, mobile, and graphic design projects. The free illustration are pixel-perfect to fit your design and available in both png and SVG vector. You can easily change the illustration colors and download right away.<br><br>Be sure to check <a href="#">new illustrations</a> and bookmark our website.</p>
                </div>
            </div>
            <div class="ms-card-right">
                <h2 class="ms-sidebar-heading"><span>CHANGE ACCENT COLOR</span></h2>
                <div class="ms-predefind-colos">
                    <input-color-picker :key="color.id" v-for="(color) in editableColors" @input="changeColor($event, color)"  :value="color.original_color"></input-color-picker>
                </div>
                <h2 class="ms-sidebar-heading"><span>Background color</span></h2>
                <div class="ms-custom-color">
                        <input-color-picker  :value="backgroundColor" @input="backgroundColor=$event"></input-color-picker>
                        <button @click="backgroundColor=null" v-if="backgroundColor" class="ms-custom-btn">Transparent</button>
                </div>
                <h2 class="ms-sidebar-heading"><span>FLIP ILLUSTRATION</span></h2>
                <div class="ms-flip-btns">
                    <div class="ms-flip-btn" @click="rotedClockwise">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.49963 4.875C7.20011 4.875 6.95801 5.11764 6.95801 5.41662V11.916C6.95801 12.215 7.20011 12.4577 7.49963 12.4577C7.79915 12.4577 8.04125 12.215 8.04125 11.916V5.41662C8.04125 5.11764 7.79915 4.875 7.49963 4.875Z" fill="black" fill-opacity="0.4"></path>
                            <path d="M12.8129 4.57218L9.38395 8.00225C9.37691 8.00821 9.33249 8.0472 9.32599 8.0537C9.19601 8.18261 9.12451 8.35213 9.12451 8.53141C9.12451 8.69931 9.18571 8.86017 9.30325 8.99178L12.8189 12.7782C12.944 12.9169 13.1314 12.9998 13.3221 12.9998C13.6952 12.9998 13.9991 12.6959 13.9991 12.3227V5.01089C13.9991 4.45898 13.3139 4.05439 12.8129 4.57218Z" fill="black" fill-opacity="0.4"></path>
                            <path d="M2.20727 4.59353C2.20077 4.58594 2.16123 4.54045 2.15365 4.53341C2.02474 4.40396 1.85522 4.33301 1.67702 4.33301C1.30385 4.33301 1 4.63685 1 5.01003V12.3219C1 12.695 1.30385 12.9989 1.67702 12.9989C1.86767 12.9989 2.05507 12.916 2.17531 12.7822L5.70125 8.98495C5.81336 8.8593 5.87456 8.69844 5.87456 8.53054C5.87456 8.35126 5.80307 8.18174 5.63679 8.02142L2.20727 4.59353Z" fill="black" fill-opacity="0.4"></path>
                            <path d="M11.8325 3.3854V0.406496C11.8325 0.242386 11.7334 0.0939822 11.5817 0.0311545C11.4301 -0.0322148 11.2551 0.00299036 11.1392 0.119438L10.1464 1.11222C9.23707 0.405954 8.11863 0.000282273 6.95794 0.000282273C5.37371 0.000282273 3.88913 0.717385 2.88497 1.96852C2.69757 2.20142 2.73495 2.54264 2.96838 2.73004C3.20236 2.91798 3.54304 2.88061 3.72936 2.64663C4.52716 1.6533 5.7041 1.08352 6.95794 1.08352C7.83049 1.08352 8.67379 1.37437 9.37519 1.88349L8.16034 3.09834C8.04389 3.21424 8.00977 3.38919 8.07205 3.54084C8.13488 3.69249 8.28274 3.79161 8.44739 3.79161H11.4263C11.6505 3.79161 11.8325 3.60963 11.8325 3.3854Z" fill="black" fill-opacity="0.4"></path>
                        </svg>
                    </div>
                    <div class="ms-flip-btn" @click="mirrorEffect">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M5.41667 5.95801C5.11767 5.95801 4.875 6.20068 4.875 6.49968C4.875 6.79868 5.11767 7.04135 5.41667 7.04135H11.9167C12.2157 7.04135 12.4583 6.79868 12.4583 6.49968C12.4583 6.20068 12.2157 5.95801 11.9167 5.95801H5.41667Z" fill="black" fill-opacity="0.4"></path>
                                <path d="M8.98587 8.29875C8.7275 8.06908 8.33858 8.03875 8.02225 8.36375L4.59512 11.7925C4.587 11.7995 4.54095 11.8391 4.53391 11.8467C4.40445 11.9756 4.3335 12.1446 4.3335 12.3233C4.3335 12.6965 4.63737 13.0004 5.01058 13.0004H12.3231C12.6963 13.0004 13.0002 12.6965 13.0002 12.3233C13.0002 12.1332 12.9173 11.9452 12.7835 11.825L8.98587 8.29875Z" fill="black" fill-opacity="0.4"></path>
                                <path d="M8.00058 4.61338C8.00762 4.6215 8.0477 4.66808 8.05583 4.67567C8.18475 4.80404 8.35375 4.875 8.53141 4.875C8.69933 4.875 8.86021 4.81325 8.99183 4.69625L12.7792 1.17921C12.92 1.05246 13.0002 0.869375 13.0002 0.677083C13.0002 0.303875 12.6963 0 12.3231 0H5.01058C4.63737 0 4.3335 0.303875 4.3335 0.677083C4.3335 0.85475 4.40445 1.02375 4.57183 1.18625L8.00058 4.61338Z" fill="black" fill-opacity="0.4"></path>
                                <path d="M3.54088 7.07288C3.38921 7.0095 3.21425 7.04471 3.09833 7.16117L1.88338 8.37613C1.37421 7.67467 1.08333 6.83129 1.08333 5.95867C1.08333 4.70471 1.65317 3.52821 2.64658 2.73034C2.8795 2.54292 2.91688 2.20167 2.72946 1.96875C2.54204 1.73584 2.20187 1.699 1.96788 1.88534C0.717167 2.89013 0 4.37484 0 5.95867C0 7.11946 0.405708 8.238 1.1115 9.14746L0.119167 10.1403C0.00325 10.2563 -0.0319583 10.4312 0.030875 10.5829C0.0937083 10.7345 0.242125 10.8337 0.40625 10.8337H3.38542C3.60967 10.8337 3.79167 10.6517 3.79167 10.4274V7.44825C3.79167 7.28413 3.69254 7.13571 3.54088 7.07288Z" fill="black" fill-opacity="0.4"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="13" height="13" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
                <div class="ms-card-seperator"></div>
                <div class="ms-btn-group">
                    <button class="ms-btn ms-style3 ms-color1" @click="downloadFreePng">Download Free PNG</button>

                        <button class="ms-btn ms-style3 ms-color2"><svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.3467 5.33333H10.5379V3.80952C10.5379 1.67619 8.75863 0 6.49407 0C4.22952 0 2.45023 1.67619 2.45023 3.80952V5.33333H1.64146C0.751818 5.33333 0.0239258 6.01905 0.0239258 6.85714V14.4762C0.0239258 15.3143 0.751818 16 1.64146 16H11.3467C12.2363 16 12.9642 15.3143 12.9642 14.4762V6.85714C12.9642 6.01905 12.2363 5.33333 11.3467 5.33333ZM6.49407 12.1905C5.60443 12.1905 4.87654 11.5048 4.87654 10.6667C4.87654 9.82857 5.60443 9.14286 6.49407 9.14286C7.38372 9.14286 8.11161 9.82857 8.11161 10.6667C8.11161 11.5048 7.38372 12.1905 6.49407 12.1905ZM9.00126 5.33333H3.98689V3.80952C3.98689 2.51429 5.11917 1.44762 6.49407 1.44762C7.86898 1.44762 9.00126 2.51429 9.00126 3.80952V5.33333Z" fill="white"></path></svg>Unlock Large PNG</button>
                        <div class="cs-download-note">No Watermark, High Resolution PNG ({{ item.width }}x{{ item.height }}).</div>
                </div>
            </div>
        </div>
        <div class="ms-tages ms-type2">
            <span class="ms-tag-icon">
              <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.7243 0.61874C19.5363 0.422169 19.3123 0.266229 19.0655 0.160003C18.8187 0.0537775 18.5538 -0.000611273 18.2864 5.18211e-06H12.7125C12.3468 0.000709925 11.9962 0.150444 11.7367 0.416714L0.593761 11.9336C0.21354 12.3275 0 12.8612 0 13.4176C0 13.9741 0.21354 14.5078 0.593761 14.9017L5.89884 20.3859C6.27994 20.7791 6.7964 21 7.33485 21C7.8733 21 8.38975 20.7791 8.77085 20.3859L19.9093 8.87369C20.1673 8.60584 20.3127 8.24349 20.3137 7.86544V2.09995C20.3154 1.82499 20.2641 1.55243 20.1629 1.29814C20.0617 1.04385 19.9126 0.812904 19.7243 0.61874ZM15.9608 5.99986C15.6738 5.99986 15.3933 5.91189 15.1547 5.74707C14.9161 5.58225 14.7301 5.34799 14.6203 5.07391C14.5105 4.79982 14.4818 4.49823 14.5377 4.20727C14.5937 3.9163 14.7319 3.64903 14.9348 3.43926C15.1378 3.22949 15.3963 3.08663 15.6778 3.02875C15.9592 2.97088 16.251 3.00058 16.5161 3.11411C16.7812 3.22764 17.0078 3.41989 17.1673 3.66656C17.3267 3.91323 17.4118 4.20323 17.4118 4.49989C17.4118 4.89771 17.2589 5.27923 16.9868 5.56053C16.7147 5.84183 16.3456 5.99986 15.9608 5.99986Z" fill="black" fill-opacity="0.4"></path></svg>
            </span>
            <inertia-link v-for="(tag, key) in tags" :key="key" :href="route('frontend.illustrations3d.index', {search: tag.name})"  class="ms-tag">{{ tag.name }}</inertia-link>
        </div>


    </div>
</template>

<script>




// Source from:  http://stackoverflow.com/questions/18480474/how-to-save-an-image-from-canvas

/* Canvas Donwload */
function download(canvas, filename) {
    /// create an "off-screen" anchor tag
    var lnk = document.createElement('a'), e;

    /// the key here is to set the download attribute of the a tag
    lnk.download = filename;

    /// convert canvas content to data-uri for link. When download
    /// attribute is set the content pointed to by link will be
    /// pushed as "download" in HTML5 capable browsers
    lnk.href = canvas.toDataURL("image/png;base64");

    /// create a "fake" click-event to trigger the download
    if (document.createEvent) {
        e = document.createEvent("MouseEvents");
        e.initMouseEvent("click", true, true, window,
            0, 0, 0, 0, 0, false, false, false,
            false, 0, null);

        lnk.dispatchEvent(e);
    } else if (lnk.fireEvent) {
        lnk.fireEvent("onclick");
    }
}



import _ from 'underscore';
import toastr from 'toastr';
import InputColorPicker from "../../../Shared/InputColorPicker";
    export default {
        components: {InputColorPicker},
        props: {
            item: {
                type: Object,
            }
        },
        data () {
          return {
              canvas: null,
              assets: [],
              backgroundColor: null,
              editableColors: [],
          }
        },

        mounted() {
            //setup canvas
            this.canvas = document.getElementById('canvas');
            console.log(this.canvas);
            this.canvas.getContext("2d").globalCompositeOperation = 'multiply';

            //add all assets
            for(var i = 0; i < this.item.assets.length; i++) {
                for (var c = 0; c < this.item.assets[i].colors.length; c++) {
                    var color = this.item.assets[i].colors[c];
                    this.editableColors.push({
                        'asset_id': color.colorable_id,
                        'original_color': color.color_code,
                        'edited_value': color.color_code
                    });
                }
                this.getAssetsData(this.item.assets[i],  (asset, response) => {

                    var modifiedAsset = {
                        id: asset.id,
                        response: response,
                        imageDataUrl: "AB",
                        order: asset.id
                    }

                    //if svg file
                    if (asset.is_editable) {
                        modifiedAsset.imageDataUrl = "data:image/svg+xml;base64," + btoa(response);
                        this.addAssets(modifiedAsset);
                        return;
                    }

                    //else
                    var reader = new FileReader();
                    reader.onloadend = () => {
                        modifiedAsset.imageDataUrl = reader.result;
                        this.addAssets(modifiedAsset);
                    }
                    reader.readAsDataURL(response);
                })
            }
        },
        methods: {
            changeColor: _.debounce(function (editableColor, colorObj) {
                this.assets.forEach((currentValue, index) => {
                    if(currentValue.id === colorObj.asset_id) {
                        colorObj.edited_value=editableColor
                        var svgStr = currentValue.response;
                        var editedStr = svgStr.replaceAll(colorObj.original_color, colorObj.edited_value)
                        currentValue.imageDataUrl = "data:image/svg+xml;base64," + btoa(editedStr);
                        this.assets[index] = currentValue;
                    }
                });
                this.redrawCanvas(1)
            }, 200),

            redrawCanvas(i) {
                const context = this.canvas.getContext('2d');
                context.clearRect(0,0, this.canvas.width, this.canvas.height);

                this.assets.forEach((currentValue) => {
                    this.drawDataURIOnCanvas(currentValue.imageDataUrl)
                });
            },

            drawDataURIOnCanvas(imageDataUrl) {
                var canvas = this.canvas;
                // console.log(strDataURI)
                var img = new window.Image();
                img.addEventListener("load", function () {
                   canvas.getContext("2d").drawImage(img, 0, 0);
                });
                img.setAttribute("src", imageDataUrl);
            },

            getAssetsData(asset, callback) {
                // console.log(asset)
                var xhr = new XMLHttpRequest();
                xhr.onloadend = function() {
                    callback(asset, xhr.response);
                };
                xhr.open('GET', asset.src);
                xhr.responseType = asset.is_editable ? 'text' : 'blob';
                xhr.send();
            },

            addAssets(asset) {
                this.assets = this.assets.sort(function(a,b){
                    return a.order > b.order
                });
                this.assets.push(asset)
                if(this.isReadyToEdit) {
                    this.redrawCanvas();
                }
            },

            rotedClockwise() {
                toastr.info("We are working on it. clockwise rotation..")
            },
            mirrorEffect() {
                toastr.info("We are working on it. Anti clockwise reflection..")
            },

            downloadPng() {
                var canvas = document.createElement('canvas');
                canvas.height = this.canvas.height;
                canvas.width = this.canvas.width;
                var ctx = canvas.getContext("2d");

                if(this.backgroundColor) {
                    ctx.fillStyle=this.backgroundColor;
                    ctx.fillRect(0, 0, canvas.width, canvas.height);
                }

                ctx.drawImage(this.canvas, 0, 0);

                download(canvas, this.item.name + '.png');
            },

            downloadFreePng() {
                this.downloadPng();
            }
        },
        computed: {
            isReadyToEdit() {
               return this.assets.length   === this.item.assets.length;
            },
            tags() {
                return this.item.tags
            }
        }
    }


    var alert = '';
</script>

<style>
    .abc{
        max-height: 100px;
        overflow: scroll;
        max-width: 200px
    }
    .ms-editable-img img{
        position: absolute;
        max-height: 100%;
        mix-blend-mode: multiply;
    }

    #canvas{
        max-width: 100%;
        max-height: 100%;
    }
</style>
