      
      <!-- Slideshow -->
        <div id="slideshow" class="carousel slide wow fadeInDown"  data-wow-duration="3s" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#slideshow" data-slide-to="0" class="active"></li>
            <li data-target="#slideshow" data-slide-to="1"></li>
            <li data-target="#slideshow" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
          <div class="item active">
                <img src="<?php echo assets('blog/images/slides/AdobeStock_542915248-scaled-1-2000x889.jpg'); ?>" alt="...">
            </div>
            <div class="item">
                <img src="<?php echo assets('blog/images/slides/picasso-guernica.jpg'); ?>" alt="...">
            </div>
            <div class="item">
                <img src="<?php echo assets('blog/images/slides/vikings.jpg'); ?>" alt="...">
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#slideshow" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#slideshow" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <!--/ Slideshow -->
        <!-- Main Content -->
        

        <div class="search-container d-flex justify-content-center align-items-center mrg">
    <div class="row">
        <div class="col-md-1">
            <select class="form-select" name="searchBy" id="searchBy" style="margin-right: 10px; padding: 8px; border-radius: 60px;">
                <option value="title">Title</option>
                <option value="category">Category</option>
                <option value="category">Tags</option>
            </select>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control search-input" id="searchInput" onkeyup="filterPosts()" placeholder="Search by name..." style="height: 40px;">
        </div>
        <div class="col-md-3">
            <button class="btn" id="searchButton" style="margin-right: 10px; padding: 8px; border-radius: 20px; background-color:antiquewhite">Search</button>
        </div>
    </div>
</div>




<br>
<!-- Main Content -->
<div class="col-sm-9 col-xs-12" id="main-content">
    <?php foreach ($posts as $post) { ?>
        <div class="post-box">
            <?php echo $post_box($post); ?>
        </div>
    <?php } ?>
</div>


<!--/ Main Content -->
<script>
    const searchInput= document.getElementById('searchInput');
    const searchBy= document.getElementById('searchBy');
    const searchButton = document.getElementById('searchButton');
    const selectTitle  = document.querySelectorAll('.selectTitle'); 
    const selectCategory = document.querySelectorAll('.selectCategory');
    searchButton.addEventListener('click', function() {
        selectTitle.forEach(ele => {
            ele.style.display = 'block';
        })
        selectCategory.forEach(ele => {
            ele.style.display = 'block';
        })

        selectTitle.forEach(ele => {
            if(searchInput.value  == ele.getAttribute('selectTitle')  && searchBy.value == 'title'){}
            else if(searchBy.value == 'title') ele.style.display = 'none';
        })

        selectCategory.forEach(ele => {
            if(searchInput.value  == ele.getAttribute('selectCategory')  && searchBy.value == 'category'){}
            else if(searchBy.value == 'category') ele.style.display = 'none';
        })
    })
</script>