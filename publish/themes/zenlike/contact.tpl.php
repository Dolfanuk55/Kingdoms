          
       <!-- Main Content Div -->
       <div id="primarycontainer">
        <div id="primarycontent">
        <div class="post">
					<h4><?php echo $this->MESSAGE; ?></h4>
					<div class="contentarea">
          <form action="<?php echo $this->C_URL; ?>" method="post">			
					<p class="form_area">
					<input type="hidden" name="process" value="1" />
					<label><?php echo $this->NAME; ?>:<br /></label>
					<input name="name" type="text" size="40" value="<?php echo $this->NAME_VALUE; ?>" /><?php echo $this->NAME_ERROR; ?><br /><br />
					<label><?php echo $this->EMAIL; ?>:<br /></label>
					<input name="email" type="text" size="40" value="<?php echo $this->EMAIL_VALUE; ?>" /><?php echo $this->EMAIL_ERROR; ?><br /><br />
					<label><?php echo $this->SUBJECT; ?>:<br /></label>
					<input name="subject" type="text" size="40" value="<?php echo $this->SUBJECT_VALUE; ?>" /><?php echo $this->SUBJECT_ERROR; ?><br /><br />
					<label><?php echo $this->COMMENTS; ?>:<br /></label>
					<textarea name="comments" rows="5" cols="40"><?php echo $this->COMMENTS_VALUE; ?></textarea><?php echo $this->COMMENTS_ERROR; ?><br />
          <?php echo $this->CAPTCHA; ?>
          <input class="button" type="submit" value="<?php echo $this->SUBMIT; ?>" title="<?php echo $this->SUBMIT; ?>" />		
					</p>					
				  </form>
				  </div>
         </div>
         </div>
       </div>
       <!-- End Main Content Div -->
