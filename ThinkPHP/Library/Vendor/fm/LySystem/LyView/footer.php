

</div>
<div id="footer">
	<p><?php if($_LibLogin->is_login()):?>&nbsp;&nbsp;&nbsp;&nbsp;( 当前版本: <?php echo VERSION?> )<?php endif;?></p>
</div>
</div>
</body>
<?php if($_LibLogin->is_login() && $_LibTemplate->is_home()):?>
<script type="text/javascript" src="<?php echo get_file_url('js/LyApi.js')?>"></script>
<script type="text/javascript" src="<?php echo get_file_url('js/load.js')?>"></script>
<script type="text/javascript" src="<?php echo get_file_url('js/LyEdit.js')?>"></script>
<!--<script type="text/javascript" src="--><?php //echo get_file_url('js/LyUpload.js')?><!--"></script>-->
<script type="text/javascript" src="<?php echo get_file_url('js/LyUpload2.js')?>"></script>
<script type="text/javascript" src="<?php echo get_file_url('js/LyCode.js')?>"></script>
<!--<script type="text/javascript" src="--><?php //echo get_file_url('js/jquery.uploadify.min.js')?><!--"></script>-->
<script type="text/javascript" src="<?php echo get_file_url('edit_area/edit_area_full.js')?>"></script>
<?php endif;?>
<script type="text/javascript" src="<?php echo get_file_url('js/jquery.colorbox-min.js')?>"></script>
</html>