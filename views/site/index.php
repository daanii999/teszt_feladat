<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="site-index">

    <div class="jumbotron bg-transparent">
		<div id="cont">
			<?php if(isset($Groups)) echo $Groups; ?>
		</div>
	</div>
</div>