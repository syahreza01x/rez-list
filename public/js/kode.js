// ubah ini saat hosting
// base url
const base_url = "http://project_sendiri.test";

// https://api.jikan.moe/v4/anime?q=naruto&sfw
window.addEventListener("keydown", (e) => {
    if (e.keyCode == 13) {
        let param = document.getElementById("search-input").value;
        if (param == "") {
            alert("isi dulu");
        } else {
            cari(param);
        }
    }
});

$("#search-button").click(function (e) {
    e.preventDefault();
    //mendapatkan value dari input
    let param = $("#search-input").val();
    cari(param);
});

let data = [];
let detail_anime = [];

async function cari(param) {
    $("#pencarian").html("Hasil dari pencarian : " + param);
    // .then((e) => console.info(e))
    // .then((e) => console.info(e.json()));

    let res = await fetch(`https://api.jikan.moe/v4/anime?q=${param}&sfw`);
    let json = await res.json();
    data = json.data;

    $("#root").html("");
    data.forEach((element, index) => {
        let genre = [];
        element.genres.map((item) => {
            genre.push(item.name);
        });
        let studio = [];
        element.studios.map((item) => {
            studio.push(item.name);
        });

        $("#root").append(`
          
      <div class="card col-4" style="width: 18rem; padding-bottom: 35px">
          <img loading="lazy" src="${element.images.jpg.image_url}" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">${element.title_english}</h5>
              <p class="card-text" style="height:100px; overflow:hidden;">Synopsis : ${element.synopsis}</p>
              <p class="card-text" >Type : ${element.type}</p>
              <p class="card-text" >Source : ${element.source}</p>
              <p class="card-text" >Season : ${element.season}</p>
              
              <p class="card-text d-flex pl-2">Score : <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 256 256"><path fill="#f60" d="M239.2 97.29a16 16 0 0 0-13.81-11L166 81.17l-23.28-55.36a15.95 15.95 0 0 0-29.44 0L90.07 81.17l-59.46 5.15a16 16 0 0 0-9.11 28.06l45.11 39.42l-13.52 58.54a16 16 0 0 0 23.84 17.34l51-31l51.11 31a16 16 0 0 0 23.84-17.34l-13.51-58.6l45.1-39.36a16 16 0 0 0 4.73-17.09Zm-15.22 5l-45.1 39.36a16 16 0 0 0-5.08 15.71L187.35 216l-51.07-31a15.9 15.9 0 0 0-16.54 0l-51 31l13.46-58.6a16 16 0 0 0-5.08-15.71L32 102.35a.37.37 0 0 1 0-.09l59.44-5.14a16 16 0 0 0 13.35-9.75L128 32.08l23.2 55.29a16 16 0 0 0 13.35 9.75l59.45 5.14v.07Z"/></svg> 
              <span class="mx-1">${element.score} / 10</span>
                 </p>

    <button type="submit" class="detail btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="padding: 5px 20px; position: absolute; bottom: 10px; left: 30px" data-id="${element.mal_id}">Detail</button>
            </div>
          </div>
          `);
    });
}

$(window).click(function (e) {
    e.preventDefault();
    if (e.target.className.includes("detail")) {
        const id_anime = $(e.target).data("id");
        async function detail(param) {
            let res = await fetch(`https://api.jikan.moe/v4/anime/${param}`);
            let json = await res.json();
            detail_anime = json.data;

            let genre = [];
            detail_anime.genres.map((item) => {
                genre.push(item.name);
            });
            let studio = [];
            detail_anime.studios.map((item) => {
                studio.push(item.name);
            });

            $(".modal-body").html(`
            
    
            <div class="w-100  row">
            <div class="p-5 col-3 ">
                <img src="${detail_anime.images.jpg.image_url}" alt=""
                    style="width: 300px; aspect-ratio:3/4;"
                    class="object-fit-cover border rounded img-fluid">
                <p>${detail_anime.score}/10</p>
                <p style="font-size: 13px;"> rating : ${detail_anime.rating}</p>
    
            </div>
            <div class="p-5 col-7 ">
                <h1>${detail_anime.title}</h1>
                <div class="row">
                    <div class="col-6">
                        <p>Status : ${detail_anime.status}</p>
                        <p>Durasi : ${detail_anime.duration}</p>
                        <p>Tahun rilis : ${detail_anime.year}</p>
                    </div>
                    <div class="col-6">
                        <p>Genre:  ${genre.join(", ")}</p>
                        <p>Studio : ${studio.join(" ")}</p>
                        <p>Rank : ${detail_anime.rank}</p>
                    </div>
                </div>
    
                <div class="">
                    <p>${detail_anime.synopsis}</p>
                </div>
            </div>
            <div class=" pt-5 col-2 ">
                <a href="${
                    detail_anime.trailer.url
                }" target="_blank" class=" relative" onclick="redirectYoutube('${
                detail_anime.trailer.url
            }')">
                    <div
                        class="max-w-[200px] mx-auto aspect-video rounded-[9px] overflow-hidden 
                    
                    after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:z-50
                    after:content-['play'] after:grid after:place-items-center after:top-1/2  after:aspect-video after:bg-black/0 after:py-1 after:px-3 after:border after:border-white after:text-white
                    ">
                        <img src="${
                            detail_anime.trailer.images.image_url
                        }" alt="trailer"
                            class=" w-full h-full rounded-md object-cover">
                    </div>
                </a>
            </div>
            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="save" data-id="${
                                detail_anime.mal_id
                            }">Save to List</button>
                        </div>
        </div>
            `);
        }
        detail(id_anime);
    }
});

//
$("#dashboard").click(function (e) {
    e.preventDefault();
    window.location.href = `${base_url}/dashboard`;
});

$("#listData").click(function (e) {
    e.preventDefault();
    window.location.href = `${base_url}/user`;
});
$("#profile").click(function (e) {
    e.preventDefault();
    window.location.href = `${base_url}/profile`;
});

// $("#logout").click(function (e) {
//     e.preventDefault();
//     window.location.href = `${base_url}/`;
// });
// $("#create").click(function (e) {
//     e.preventDefault();
//     window.location.href = `${base_url}/user/create`;
// });

$("#create").click(function (e) {
    e.preventDefault();
    window.location.href = `${base_url}/user/create`;
});

$("#root").click(function (e) {
    const id = $(e.target).attr("data-id");
    async function detail(param) {
        let res = await fetch(`https://api.jikan.moe/v4/anime/${param}`);
        let json = await res.json();
        detail_anime = json.data;

        let genre = [];
        detail_anime.genres.map((item) => {
            genre.push(item.name);
        });
        let studio = [];
        detail_anime.studios.map((item) => {
            studio.push(item.name);
        });

        $(".modal-body").html(`
        

        <div class="w-100  row">
        <div class="p-5 col-3 ">
            <img src="${detail_anime.images.jpg.image_url}" alt=""
                style="width: 300px; aspect-ratio:3/4;"
                class="object-fit-cover border rounded img-fluid">
            <p>${detail_anime.score}/10</p>
            <p style="font-size: 13px;"> rating : ${detail_anime.rating}</p>

        </div>
        <div class="p-5 col-7 ">
            <h1>${detail_anime.title}</h1>
            <div class="row">
                <div class="col-6">
                    <p>Status : ${detail_anime.status}</p>
                    <p>Durasi : ${detail_anime.duration}</p>
                    <p>Tahun rilis : ${detail_anime.year}</p>
                </div>
                <div class="col-6">
                    <p>Genre:  ${genre.join(", ")}</p>
                    <p>Studio : ${studio.join(" ")}</p>
                    <p>Rank : ${detail_anime.rank}</p>
                </div>
            </div>

            <div class="">
                <p>${detail_anime.synopsis}</p>
            </div>
        </div>
        <div class=" pt-5 col-2 ">
            <a href="${
                detail_anime.trailer.url
            }" target="_blank" class=" relative" onclick="redirectYoutube('${detail_anime.trailer.url}')">
                <div
                    class="max-w-[200px] mx-auto aspect-video rounded-[9px] overflow-hidden 
                
                after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:z-50
                after:content-['play'] after:grid after:place-items-center after:top-1/2  after:aspect-video after:bg-black/0 after:py-1 after:px-3 after:border after:border-white after:text-white
                ">
                    <img src="${
                        detail_anime.trailer.images.image_url
                    }" alt="trailer"
                        class=" w-full h-full rounded-md object-cover">
                </div>
            </a>
        </div>
        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="save"   data-id="${
                            detail_anime.mal_id
                        }">Save to List</button>
                    </div>
    </div>
        `);
    }
    detail(id);
});

function redirectYoutube(e) {
    window.location.href = e;
}

$(".modal-body").click(function (e) {
    if (e.target.id == "save") {
        let id = $(e.target).data("id");

        window.location.href = `${base_url}/apiget/${id}`;
    }
});
