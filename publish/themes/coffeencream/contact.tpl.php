          
       <!-- Main Content Div -->
       <br />
       <h3><?php echo $this->MESSAGE; ?><br /><br /></h3>
          <form action="<?php echo $this->C_URL; ?>" method="post">			
					<p>
					<input type="hidden" name="process" value="1" />
					<label><?php echo $this->NAME; ?>:<br /></label>
					<input name="name" type="text" size="40" value="<?php echo $this->NAME_VALUE; ?>" /><?php echo $this->NAME_ERROR; ?><br /><br />
					<label><?php echo $this->EMAIL; ?>:<br /></label>
					<input name="email" type="text" size="40" value="<?php echo $this->EMAIL_VALUE; ?>" /><?php echo $this->EMAIL_ERROR; ?><br /><br />
					<label><?php echo $this->SUBJECT; ?>:<br /></label>
					<input name="subject" type="text" size="40" value="<?php echo $this->SUBJECT_VALUE; ?>" /><?php echo $this->SUBJECT_ERROR; ?><br /><br />
					<label><?php echo $this->COMMENTS; ?>:</label>
					<textarea name="comments" rows="5" cols="40"><?php echo $this->COMMENTS_VALUE; ?></textarea><?php echo $this->COMMENTS_ERROR; ?><br />
          <?php echo $this->CAPTCHA; ?>
          <input class="button" type="submit" value="<?php echo $this->SUBMIT; ?>" title="<?php echo $this->SUBMIT; ?>" />		
					</p>					
				  </form>
       <!-- End Main Content Div -->
