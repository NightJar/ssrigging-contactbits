<?php

class ContactBits  extends DataExtension {

	private static $db = array(
		'Phone' => 'Varchar',
		'TollFree' => 'Varchar',
		'Mobile' => 'Varchar',
		'Fax' => 'Varchar(250)',
		'Email' => 'Varchar(200)',
		'Address' => 'Text',
		'Postal' => 'Text'
	);

	public function updateCMSFields(FieldList $fields) {
	
		$before = $fields->dataFieldByName('Content') ? 'Content' : null;
		if(!$before || $this->owner instanceof SiteConfig) $before = $fields->dataFieldByName('Theme') ? 'Theme' : null;
		
		$show = array_diff(array_keys(self::$db), (array)Config::inst()->get(__CLASS__, 'hide')); //self::$db seems really bad, but how else to do?
		
		foreach($show as $field) {
			$title = null;
			switch($field) {
				case 'Email':
					$type = 'EmailField';
					break;
				case 'Address':
				case 'Postal':
					$type = 'TextareaField';
					break;
				case 'TollFree':
					$title = 'Toll Free';
				default: $type = 'TextField';
			}
			$fields->addFieldToTab('Root.Main', $type::create($field, $title), $before);
		}
		
		return $fields;
	}
	
}
