<?php

class TeamModel extends CI_Model
{

	private $teams = array(
		'Anaheim Ducks' => array(
			'city' => 'Anaheim',
			'name' => 'Ducks',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/ducks_logo.png'
		),
		'Boston Bruins' => array(
			'city' => 'Boston',
			'name' => 'Bruins',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/bruins_logo.png'
		),
		'Buffalo Sabres' => array(
			'city' => 'Buffalo',
			'name' => 'Sabres',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/sabres_logo.png'
		),
		'Calgary Flames' => array(
			'city' => 'Calgary',
			'name' => 'Flames',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/flames_logo.png'
		),
		'Carolina Hurricanes' => array(
			'city' => 'Carolina',
			'name' => 'Hurricanes',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/hurricanes_logo.png'
		),
		'Chicago Blackhawks' => array(
			'city' => 'Chicago',
			'name' => 'Blackhawks',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/blackhawks_logo.png'
		),
		'Colorado Avalanche' => array(
			'city' => 'Colorado',
			'name' => 'Avalanche',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/avalanche_logo.png'
		),
		'Columbus Blue Jackets' => array(
			'city' => 'Columbus',
			'name' => 'Blue Jackets',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/bluejackets_logo.png'
		),
		'Dallas Stars' => array(
			'city' => 'Dallas',
			'name' => 'Stars',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/stars_logo.png'
		),
		'Detroit Red Wings' => array(
			'city' => 'Detroit',
			'name' => 'Red Wings',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/redwings_logo.png'
		),
		'Edmonton Oilers' => array(
			'city' => 'Edmonton',
			'name' => 'Oilers',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/oilers_logo.png'
		),
		'Florida Panthers' => array(
			'city' => 'Florida',
			'name' => 'Panthers',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/panthers_logo.png'
		),
		'Los Angeles Kings' => array(
			'city' => 'Los Angeles',
			'name' => 'Kings',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/kings_logo.png'
		),
		'Minnesota Wild' => array(
			'city' => 'Minnesota',
			'name' => 'Wild',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/wild_logo.png'
		),
		'Montreal Canadiens' => array(
			'city' => 'Montreal',
			'name' => 'Canadiens',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/canadiens_logo.png'
		),
		'Nashville Predators' => array(
			'city' => 'Nashville',
			'name' => 'Predators',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/predators_logo.png'
		),
		'New Jersey Devils' => array(
			'city' => 'New Jersey',
			'name' => 'Devils',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/devils_logo.png'
		),
		'New York Islanders' => array(
			'city' => 'New York',
			'name' => 'Islanders',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/islanders_logo.png'
		),
		'New York Rangers' => array(
			'city' => 'New York',
			'name' => 'Rangers',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/rangers_logo.png'
		),
		'Ottawa Senators' => array(
			'city' => 'Ottawa',
			'name' => 'Senators',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/senators_logo.png'
		),
		'Philadelphia Flyers' => array(
			'city' => 'Philadelphia',
			'name' => 'Flyers',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/flyers_logo.png'
		),
		'Phoenix Coyotes' => array(
			'city' => 'Phoenix',
			'name' => 'Coyotes',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/coyotes_logo.png'
		),
		'Pittsburgh Penguins' => array(
			'city' => 'Pittsburgh',
			'name' => 'Penguins',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/penguins_logo.png'
		),
		'St. Louis Blues' => array(
			'city' => 'St. Louis',
			'name' => 'Blues',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/blues_logo.png'
		),
		'San Jose Sharks' => array(
			'city' => 'San Jose',
			'name' => 'Sharks',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/sharks_logo.png'
		),
		'Tampa Bay Lightning' => array(
			'city' => 'Tampa Bay',
			'name' => 'Lightning',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/lightning_dark_logo.png'
		),
		'Toronto Maple Leafs' => array(
			'city' => 'Toronto',
			'name' => 'Maple Leafs',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/mapleleafs_dark_logo.png'
		),
		'Vancouver Canucks' => array(
			'city' => 'Vancouver',
			'name' => 'Canucks',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/canucks_logo.png'
		),
		'Washington Capitals' => array(
			'city' => 'Washington',
			'name' => 'Capitals',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/capitals_logo.png'
		),
		'Winnipeg Jets' => array(
			'city' => 'Winnipeg',
			'name' => 'Jets',
			'logo' => 'http://cdn.nhle.com/nhl/images/logos/fullsvg/jets_logo.png'
		)
	);

	function get($name=null)
	{
		if ($name)
		{
			return $this->teams[$name];
		}

		return $this->teams;
	}

	function get_by_city($city)
	{
		foreach ($this->teams as $team)
		{
			if ($team['city']===$city)
			{

				return $team;
			}
		}
		return null;
	}

}