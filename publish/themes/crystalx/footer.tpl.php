        <!-- Right column -->
        <div id="col" class="noprint">
            <div id="col-in">

                <!-- Profile -->
                <h3><span><?php echo $this->PROFILE; ?></span></h3>

                <div id="profile">
                    <p>
                    <?php echo $this->IMAGE; ?>
                    - <a href="<?php echo $this->P_URL; ?>" title="<?php echo $this->VIEW_PROFILE; ?>"><?php echo $this->VIEW_PROFILE; ?></a>
                    </p>
                </div> 
                <!-- /profile -->

                <hr class="noscreen" />

                <!-- Archive -->
                <h3><span><?php echo $this->ARCHIVE; ?></span></h3>

                <ul id="archive">
                   <?php echo $this->SHOW_ARCHIVE; ?>
                </ul>
                <!-- /archive -->

                <hr class="noscreen" />

                <!-- Favourites -->
                <?php echo $this->FAVOURITE_SITES; ?>
                <!-- /Favourites -->
                
                <!-- Adsense -->
                <?php echo $this->ADSENSE_BLOCK; ?>
                <!-- /Adsense -->
                
            </div> 
            <!-- /col-in -->
        </div> 
        <!-- /col -->

    </div> 
    <!-- /page-in -->
    </div> 
    <!-- /page -->

    <!-- Footer -->
    <div id="footer">
        <div id="top" class="noprint"><p><span class="noscreen"><?php echo $this->TOP; ?></span> <a href="#top" title="<?php echo $this->TOP; ?>">^<span></span></a></p></div>
        <hr class="noscreen" />
        
        <p id="createdby">Design: <a href="http://www.nuvio.cz" title="Nuvio | Webdesign">Nuvio | Webdesign</a></p>
        <p id="copyright"><?php echo $this->FOOTER; ?></p>
    </div> 
    <!-- /footer -->

</div> 
<!-- /main -->

<!-- Snap Code -->
<?php echo $this->SNAP_CODE; ?>
<!-- End Snap Code -->

</body>
</html>
