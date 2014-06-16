<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Welcome extends Controller_Template {

	public $template = 'slam_land';

	public function action_index()
	{

		$profile = new D3('emb3r#1997');

		$db = Database::instance();

		echo $db->list_columns('students');

		$this->template->page_title = 'Welcome to the Slam Dance Clan!';

		$CAREER_DATA = $profile->getCareer() or die('Couldn\'t fetch career<br />');
		$HEROES = array();

		// Before handling the data check to make sure the return is an array
		// If the data is not an array then something wen't wrong.
		//
		if(is_array($CAREER_DATA)) {
		    $this->template->career = json_encode($CAREER_DATA, JSON_PRETTY_PRINT);
		    
		    foreach( $CAREER_DATA['heroes'] as $hero )
		    {
		    	$HEROES[] = new Hero($hero['id']);
		    }
		    $this->template->heroes = json_encode($HEROES, JSON_PRETTY_PRINT);

/*
		    foreach( $HEROES['items'] as $item )
		    {

		    }
*/
		}

		// Get Item Data
		//
#		echo "<br>Item Data:";
		$ITEM_DATA = $profile->getItem('item/COGHsoAIEgcIBBXIGEoRHYQRdRUdnWyzFB2qXu51MA04kwNAAFAKYJMD');

		// If caching is enabled you could check if the data came from cache or the API.
		// This reflects the last call made to the API.
		//
		if($profile->resultsFromCache()) {
#		    echo "<br>This data is returned from cache.";
		} else {
#		    echo "<br>This data is returned from the API.";
		}

		if(is_array($ITEM_DATA)) {
#		    var_dump($ITEM_DATA);
		}

		// Get Item Information Data
		//
#		echo "<br>Item Info Data:";
		$ITEM_INFO_DATA = $profile->getItemById('Unique_Helm_006_104');
		if(is_array($ITEM_INFO_DATA)) {
#		    var_dump($ITEM_INFO_DATA);
		}

		// Get Follower Data
		// Your options are: 'enchantress', 'templar', 'scoundrel'
		//
#		echo "<br>Follower Data:";
		$FOLLOWER_DATA = $profile->getFollower('templar');
		if(is_array($FOLLOWER_DATA)) {
#		    var_dump($FOLLOWER_DATA);
		}

		// Get Artisan Data
		// Your options are: 'blacksmith', 'jeweler'
		//
#		echo "<br>Artisan Data:";
		$ARTISAN_DATA = $profile->getArtisan('blacksmith');
		if(is_array($ARTISAN_DATA)) {
#		    var_dump($ARTISAN_DATA);
		}

		/***************************************************************************************/

		/***************** Images & ToolTips (not part of the official API) ********************/

		// Get Item Image
		// Parameter Order: (Icon Name, Size)
		// Brakedown - Name: 'unique_chest_013_104_demonhunter_male', etc.
		//             Size: 'small' or 'large'
		// Returns the location of the image or false on failure.
		//
#		echo "<br>Item Image: <br>";
		$ITEM_IMAGE = $profile->getItemImage('unique_chest_013_104_demonhunter_male', 'large');
		if(!empty($ITEM_IMAGE)) {
#		    echo '<img src="'.$ITEM_IMAGE.'">';
		}

		// Get Skill Image
		// Parameter Order: (Icon Name, Size)
		// Brakedown - Name: 'barbarian_frenzy', etc.
		//             Size: '21', '42' or '64'
		// Returns the location of the image or false on failure.
		//
#		echo "<br>Skill Image: <br>";
		$SKILL_IMAGE = $profile->getSkillImage('barbarian_frenzy', '64');
		if(!empty($SKILL_IMAGE)) {
#		    echo '<img src="'.$SKILL_IMAGE.'">';
		}

		// Get PaperDoll Image
		// Parameter Order: (Class, Gender)
		// Brakedown - Class: 'barbarian', 'witch-doctor', 'demon-hunter', 'monk' or 'wizard'
		//             Gender: 'male' or 'female'
		// Returns the location of the image or false on failure.
		//
#		echo "<br>Paperdoll: <br>";
		$PAPERDOLL = $profile->getPaperDoll('barbarian', 'female');
		if(!empty($PAPERDOLL)) {
#		    echo '<img src="'.$PAPERDOLL.'">';
		}

		// Get All Item Images for 1 Hero
		// Parameter Order: (Hero ID, Size)
		// Brakedown - Name: 'unique_chest_013_104_demonhunter_male', etc.
		//             Size: 'small' or 'large'
		// Returns true on success.
		//
		$allItemImages = $profile->getAllHeroItemImages(3982160, 'small');
		if($allItemImages) {
#		    echo "<br>All Hero Item Images Saved";
		}

		// Get All Skill Image for 1 Hero
		// Parameter Order: (Hero ID, Size)
		// Brakedown - Hero ID: 3982160
		//             Size: 21, 42 or 64
		// Returns true on success.
		//
		$allSkillImages = $profile->getAllHeroSkillImages(3982160, 42);
		if($allSkillImages) {
#		    echo "<br>All Hero Skill Images Saved";
		}

		// Get ToolTip Skill Data (for javascript handling)
		// Parameter Order: (tooltipUrl, boolean)
		// Brakedown - tooltipUrl: 'skill/barbarian/frenzy', etc.
		//             Boolean: true for jsonp, false or leave empty for json.
		//
#		echo "<br>Skill Tooltip: <br>";
		$SKILL_TOOLTIP = $profile->getSkillToolTip('skill/barbarian/frenzy', true);
		if(!empty($SKILL_TOOLTIP)) {
#		    echo $SKILL_TOOLTIP;
		}

		// Get ToolTip Rune Data (for javascript handling)
		// Parameter Order: (tooltipUrl, boolean)
		// Brakedown - tooltipUrl: 'rune/frenzy/a', etc.
		//             Boolean: true for jsonp, false or leave empty for json.
		//
#		echo "<br>Skill Rune Tooltip: <br>";
		$SKILL_RUNE_TOOLTIP = $profile->getSkillToolTip('rune/frenzy/a');
		if(!empty($SKILL_RUNE_TOOLTIP)) {
#		    echo $SKILL_RUNE_TOOLTIP;
		} 
	}
}
