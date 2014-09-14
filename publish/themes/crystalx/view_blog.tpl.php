
      
      <!-- Main Content Div -->
      <div id="content">
       <?php echo $this->BLOG_DATA; ?>
       <div class="{comment_class}">
                <h2><span><?php echo $this->COMMENT_COUNT; ?></span></h2>
                <?php echo $this->COMMENT_DATA; ?>
                </div>
       <hr class="noscreen" />
       
       <!-- Reply Box -->
       <div>
                <h2><span><?php echo $this->ADD_COMMENTS; ?></span></h2>
                <?php echo $this->REPLY_BOX; ?>
       </div>
       <!-- /Reply Box -->
                
       </div>
       
       <hr class="noscreen" />
      </div>
      <!-- End Main Content Div -->
    

