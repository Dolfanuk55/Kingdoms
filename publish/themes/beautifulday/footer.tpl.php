		</div>

		<div class="sidenav">

			<h2><?php echo $this->PROFILE; ?></h2>
			<p class="profile"><?php echo $this->IMAGE; ?>
        - <a href="<?php echo $this->P_URL; ?>" title="<?php echo $this->VIEW_PROFILE; ?>"><?php echo $this->VIEW_PROFILE; ?></a>
      </p>

			<h2><?php echo $this->ARCHIVE; ?></h2>
			<ul>
				<?php echo $this->SHOW_ARCHIVE; ?>
			</ul>

			<?php echo $this->FAVOURITE_SITES; ?>
       
      <?php echo $this->ADSENSE_BLOCK; ?>
       
      <p>&nbsp;</p>

		</div>

		<div class="clearer"><span></span></div>

	</div>

	<div class="footer"><?php echo $this->FOOTER; ?> | Design by <a href="http://templates.arcsin.se" title="Arcsin">Arcsin</a>
	</div>

</div>
<!-- End System Wrapper -->

<!-- Snap Code -->
<?php echo $this->SNAP_CODE; ?>
<!-- End Snap Code -->

</body>
</html>
