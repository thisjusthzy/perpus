<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
</ol>


<div class="carousel-inner">
    <?php foreach ($slider as $key => $value) { ?>
        
       
<div class="carousel-item <?= $value['id_slider'] == 1 ? 'active' : '' ?>">
<img class="d-block w-100" src="<?= base_url('slider/' . $value['slider'])?>">
</div>
    

   <?php } ?>
   
</div>

<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
<span class="carousel-control-custom-icon" aria-hidden="true">
<i class="fas fa-chevron-left"></i>
</span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
<span class="carousel-control-custom-icon" aria-hidden="true">
<i class="fas fa-chevron-right"></i>
</span>
<span class="sr-only">Next</span>
</a>
</div>


