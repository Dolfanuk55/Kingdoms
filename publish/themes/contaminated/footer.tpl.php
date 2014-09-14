			</div>

			<div class="sidenav">

				<h2><?php echo $this->MENU; ?></h2>
				<ul>
          <li><a href="<?php echo $this->H_URL; ?>" title="<?php echo $this->HOME; ?>"><span><?php echo $this->HOME; ?></span></a></li>
          <li><a href="<?php echo $this->P_URL; ?>" title="<?php echo $this->PROFILE; ?>"><span><?php echo $this->PROFILE; ?></span></a></li>
          <li><a href="<?php echo $this->C_URL; ?>" title="<?php echo $this->CONTACT; ?>"><span><?php echo $this->CONTACT; ?></span></a></li>
          <li><a href="<?php echo $this->A_URL; ?>" title="<?php echo $this->ARCHIVE; ?>"><span><?php echo $this->ARCHIVE; ?></span></a></li>
          <li><a href="<?php echo $this->FEED_URL; ?>" title="<?php echo $this->RSS_FEED; ?>"><span><?php echo $this->RSS_FEED; ?></span></a></li>
        </ul>

				<h2><?php echo $this->PROFILE; ?></h2>
				<ul>
					<li>
           <p class="profile">
           <?php echo $this->IMAGE; ?>
           - <a href="<?php echo $this->P_URL; ?>" title="<?php echo $this->VIEW_PROFILE; ?>"><?php echo $this->VIEW_PROFILE; ?></a>
           </p>
          </li>
				</ul>

				<h2><?php echo $this->SEARCH_BLOG; ?></h2>
				<form action="<?php echo $this->SEARCH_URL; ?>" method="get">
        <p class="search_area">
         <input type="hidden" name="cmd" value="search" />
         <input name="keywords" class="searchbox" type="text" value="<?php echo $this->ENTERED_KEYWORDS; ?>" size="30" /><br /><br />
         <input class="button" type="submit" value="<?php echo $this->SEARCH; ?>" title="<?php echo $this->SEARCH; ?>" />
        </p>
        </form>
				
        <h2><?php echo $this->ARCHIVE; ?></h2>
        <ul>
          <?php echo $this->SHOW_ARCHIVE; ?>
        </ul>
        
        <?php echo $this->FAVOURITE_SITES; ?>
       
        <?php echo $this->ADSENSE_BLOCK; ?>
        
        <p>&nbsp;</p>

			</div>

			<div class="clearer"></div>

		</div>

		<div class="footer"><?php echo $this->FOOTER; ?> | Design: <a href="http://templates.arcsin.se" title="Arcsin">Arcsin</a>
		</div>

	</div>

</div>

<!-- End System Wrapper -->

<!-- Snap Code -->
<?php echo $this->SNAP_CODE; ?>
<!-- End Snap Code -->

</body>
</html>
