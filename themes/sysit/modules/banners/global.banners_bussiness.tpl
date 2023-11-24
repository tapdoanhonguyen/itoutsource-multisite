<!-- BEGIN: main  -->
<!-- BEGIN: loop -->
<section class="confirm py-10" style="background-image: url({DATA.file_image});">
<div class="container py-sm-5 py-lg-10">
<h3 class="confirm-head lh-13 mb-4 mb-lg-6">{DATA.title}</h3>
<div class="desc lh-16">
{DATA.file_alt}
</div>
</div>
</section>



<!-- END: loop -->



<style>



.pt-10, .py-10 {
    padding-top: 50px !important;
}
.pb-10, .py-10 {
    padding-bottom: 50px !important;
}
section.confirm {
    background-color: #0561a9;
    background-position: center;
    background-size: cover;
    color: #fff;
    text-align: justify;
}
section.confirm h3{
color: #fff;
}
section.confirm .desc {
    font-size: 1em;
}
.lh-16 {
    line-height: 1.6 !important;
}
section.confirm .container.py-sm-5.py-lg-10 {
    max-width: 1200px;
}
@media (min-width: 600px){
section.confirm {
    text-align: center;
}
section.confirm .desc {
    font-size: 1.1em;
}
}
@media (min-width: 768px){

}
@media (min-width: 992px){
section.confirm .desc {
    font-size: 1.2em;
}
}
@media (min-width: 1200px){

}
@media (min-width: 1600px){

}


</style>
<!-- END: main -->


<div class="nv-block-banners">
    <!-- BEGIN: type_image_link -->
    <a rel="nofollow" href="{DATA.link}" onclick="this.target='{DATA.target}'" title="{DATA.file_alt}"><img alt="{DATA.file_alt}" src="{DATA.file_image}" width="{DATA.file_width}"></a>
    <!-- END: type_image_link -->
    <!-- BEGIN: type_image -->
    <img alt="{DATA.file_alt}" src="" width="{DATA.file_width}">
    <!-- END: type_image -->
    <!-- BEGIN: bannerhtml -->
    <div class="clearfix text-left">
        {DATA.bannerhtml}
    </div>
    <!-- END: bannerhtml -->
</div>