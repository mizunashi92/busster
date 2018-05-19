    <!-- MAIN -->
    <main role="main">
      <!-- Content -->
      <article>
        <header class="section background-dark">
          <div class="line">        
            <h1 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">Our Products</h1>
            <p class="margin-bottom-0 text-size-16">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.<br>
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.</p>
          </div>  
        </header>
        <section class="section background-white">
          <div class="line">
            <h2 class="text-size-40 margin-bottom-30">Investigationes demonstraverunt lectores</h2>
            <hr class="break-small background-primary margin-bottom-30">
            <p class="margin-bottom-40">
              Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
              Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. 
              Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros 
              et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
            </p>
          </div>   
          <div class="line text-center">
            <div class="margin">
              <?php
                $i = 1;

                foreach($posts as $post) : 
                 if(($i-1) % 3   == 0){
                    echo "<div class='row'><br>&nbsp;</div> ";
                  }  
                  
              ?>
              <div class="s-12 m-12 l-4 margin-m-bottom">
                <div class="padding-2x background-primary">
                  <?php if($post['image'] != null){ ?>
                    <img src="<?php echo site_url(); ?>assets/posts/<?php echo $post['image']; ?>" width="12px">
                  <?php } ?>
                  <h2 class="text-thin"><?php echo $post['title']; ?></h2>
                  <p class="margin-bottom-30"><?php echo word_limiter($post['body'],10); ?></p>
                  <a class="button button-white-stroke text-size-12" href="<?php echo site_url('/posts/view/'.$post['slug']); ?>/">GET MORE INFO</a>
                </div>
              </div>
              <?php 
                $i++;
               
                endforeach;
                 
              ?>      
            </div>
          </div>
        </section> 
      </article>
    </main>
    
    <!-- FOOTER -->
    <footer>
      <!-- Contact Us -->
      <div class="background-primary padding text-center">
        <p class="h1">Contact Us: 0800 787 787</p>                                                                        
      </div>
      
      <!-- Main Footer -->
      <section class="background-dark full-width">
        <!-- Map -->
        <div class="s-12 m-12 l-6 margin-m-bottom-2x">
          <div class="s-12 grayscale center">     
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1459734.5702753505!2d16.91089086619977!3d48.577103681657675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ssk!2ssk!4v1457640551761" width="100%" height="450" frameborder="0" style="border:0"></iframe>
          </div>
        </div>
        
        <!-- Collumn 2 -->
        <div class="s-12 m-12 l-6 margin-m-bottom-2x">
          <div class="padding-2x">
            <div class="line">              
              <div class="float-left">
                  <i class="icon-sli-location-pin text-primary icon3x"></i>
                </div>
                <div class="margin-left-70 margin-bottom-30">
                  <h3 class="margin-bottom-0">Company Address</h3>
                  <p>Responsive Street 7<br>
                     London / United Kingdom / Europe
                  </p>               
                </div>
                <div class="float-left">
                  <i class="icon-sli-envelope text-primary icon3x"></i>
                </div>
                <div class="margin-left-70 margin-bottom-30">
                  <h3 class="margin-bottom-0">E-mail</h3>
                  <p>contact@sampledomain.com<br>
                     office@sampledomain.com
                  </p>              
                </div>
                <div class="float-left">
                  <i class="icon-sli-phone text-primary icon3x"></i>
                </div>
                <div class="margin-left-70">
                  <h3 class="margin-bottom-0">Phone Numbers</h3>
                  <p>0800 4521 800 50<br>
                     0450 5896 625 16<br>
                     0798 6546 465 15
                  </p>             
                </div>
            </div>
          </div>
        </div>  
      </section>
      <hr class="break margin-top-bottom-0" style="border-color: rgba(0, 38, 51, 0.80);">
      
     