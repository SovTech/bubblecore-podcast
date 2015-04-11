<?php namespace Bubblecore\Podcast\Updates;

use DateTimeZone;
use October\Rain\Database\Updates\Seeder;
use Bubblecore\Podcast\Models\Category;
use Bubblecore\Podcast\Models\Subcategory;
use Bubblecore\Podcast\Models\Timezone;

class SeedAllTables extends Seeder
{
	public function run()
	{
		Category::insert([
			['key' => 'arts', 'name' => 'Arts'],
	        ['key' => 'business', 'name' => 'Business'],
	        ['key' => 'comedy', 'name' => 'Comedy'],
	        ['key' => 'education', 'name' => 'Education'],
	        ['key' => 'games-hobbies', 'name' => 'Games & Hobbies'],
	        ['key' => 'government-organizations', 'name' => 'Government & Organizations'],
	        ['key' => 'health', 'name' => 'Health'],
	        ['key' => 'kids-family', 'name' => 'Kids & Family'],
	        ['key' => 'music', 'name' => 'Music'],
	        ['key' => 'news-politics', 'name' => 'News & Politics'],
	        ['key' => 'religion-spirituality', 'name' => 'Religion & Spirituality'],
	        ['key' => 'science-medicine', 'name' => 'Science & Medicine'],
	        ['key' => 'society-culture', 'name' => 'Society & Culture'],
	        ['key' => 'sports-recreation', 'name' => 'Sports & Recreation'],
	        ['key' => 'technology', 'name' => 'Technology'],
	        ['key' => 'tv-film', 'name' => 'TV & Film']
		]);
		$arts = Category::whereKey('arts')->first();
		$arts->subcategories()->createMany([
			['key' => 'design', 'name' => 'Design'],
			['key' => 'fashion-beauty', 'name' => 'Fashion & Beauty'],
			['key' => 'food', 'name' => 'Food'],
			['key' => 'literature', 'name' => 'Literature'],
			['key' => 'performing arts', 'name' => 'Performing Arts'],
			['key' => 'visual-arts', 'name' => 'Visual Arts']
		]);
		$business = Category::whereKey('business')->first();
		$business->subcategories()->createMany([
			['key' => 'business-news', 'name' => 'Business News'],
			['key' => 'careers', 'name' => 'Careers'],
			['key' => 'investing', 'name' => 'Investing'],
			['key' => 'management-marketing', 'name' => 'Management & Marketing'],
			['key' => 'shopping', 'name' => 'Shopping']
		]);
		$education = Category::whereKey('education')->first();
		$education->subcategories()->createMany([
			['key' => 'educational-technology', 'name' => 'Educational Technology'],
			['key' => 'higher-education', 'name' => 'Higher Education'],
			['key' => 'k-12', 'name' => 'K-12'],
			['key' => 'language-courses', 'name' => 'Language Courses'],
			['key' => 'training', 'name' => 'Training']
		]);
		$gamesHobbies = Category::whereKey('games-hobbies')->first();
		$gamesHobbies->subcategories()->createMany([
			['key' => 'automotive', 'name' => 'Automotive'],
			['key' => 'aviation', 'name' => 'Aviation'],
			['key' => 'hobbies', 'name' => 'Hobbies'],
			['key' => 'other-games', 'name' => 'Other Games'],
			['key' => 'video-games', 'name' => 'Video Games']
		]);
		$governmentOrganizations = Category::whereKey('government-organizations')->first();
		$governmentOrganizations->subcategories()->createMany([
			['key' => 'local', 'name' => 'Local'],
			['key' => 'national', 'name' => 'National'],
			['key' => 'non-profit', 'name' => 'Non-Profit'],
			['key' => 'regional', 'name' => 'Regional']
		]);
		$health = Category::whereKey('health')->first();
		$health->subcategories()->createMany([
			['key' => 'alternative-health', 'name' => 'Alternative Health'],
			['key' => 'fitness-nutrition', 'name' => 'Fitness & Nutrition'],
			['key' => 'self-help', 'name' => 'Self-Help'],
			['key' => 'sexuality', 'name' => 'Sexuality']
		]);
		$religionSpirituality = Category::whereKey('religion-spirituality')->first();
		$religionSpirituality->subcategories()->createMany([
			['key' => 'buddhism', 'name' => 'Buddhism'],
			['key' => 'christianity', 'name' => 'Christianity'],
			['key' => 'hinduism', 'name' => 'Hinduism'],
			['key' => 'islam', 'name' => 'Islam'],
			['key' => 'judaism', 'name' => 'Judaism'],
			['key' => 'other', 'name' => 'Other'],
			['key' => 'spirituality', 'name' => 'Spirituality']
		]);
		$scienceMedicine = Category::whereKey('science-medicine')->first();
		$scienceMedicine->subcategories()->createMany([
			['key' => 'medicine', 'name' => 'Medicine'],
			['key' => 'natural-sciences', 'name' => 'Natural Sciences'],
			['key' => 'social-sciences', 'name' => 'Social Sciences']
		]);
		$societyCulture = Category::whereKey('society-culture')->first();
		$societyCulture->subcategories()->createMany([
			['key' => 'history', 'name' => 'History'],
			['key' => 'personal-journals', 'name' => 'Personal Journals'],
			['key' => 'philosophy', 'name' => 'Philosophy'],
			['key' => 'places-travel', 'name' => 'Places & Travel']
		]);
		$sportsRecreation = Category::whereKey('sports-recreation')->first();
		$sportsRecreation->subcategories()->createMany([
			['key' => 'amateur', 'name' => 'Amateur'],
			['key' => 'college-high school', 'name' => 'College & High School'],
			['key' => 'outdoor', 'name' => 'Outdoor'],
			['key' => 'professional', 'name' => 'Professional']
		]);
		$technology = Category::whereKey('technology')->first();
		$technology->subcategories()->createMany([
			['key' => 'gadgets', 'name' => 'Gadgets'],
			['key' => 'tech news', 'name' => 'Tech News'],
			['key' => 'podcasting', 'name' => 'Podcasting'],
			['key' => 'software-how-to', 'name' => 'Software How-To']
		]);
		$arr = [];
		$timezones = array_values(DateTimeZone::listIdentifiers());
		foreach($timezones as $tz) {
			$arr[] = ['name' => $tz];
		}
		Timezone::insert($arr);
	}
}