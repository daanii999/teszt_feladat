<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="site-index">

    <div class="jumbotron bg-transparent">
		<div id="cont">
			<?php if(isset($Groups)) {
				foreach($Groups as $group) {
					if($group->parent_id == 0) {
						echo '<span class="groups">'.$group->name.'</span><br />';
						foreach($Groups as $cgroup) {
							if($cgroup->parent_id == $group->id) echo '<span class="groups">&emsp;'.$cgroup->name.'</span><br />';
						}
					}
				}
			} ?>
		</div>
	</div>
</div>