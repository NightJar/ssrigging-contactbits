<?php

class ContactBits  extends DataExtension {

	public static $db = array(
		'Address' => 'Text',
		'Postal' => 'Text',
		'Phone' => 'Varchar',
		'TollFree' => 'Varchar',
		'Mobile' => 'Varchar',
		'Fax' => 'Varchar(250)',
		'Email' => 'Varchar(200)'
	);

	public function updateCMSFields(FieldList $fields) {
		$show = self::$show;
		$before = 'Content';
		if($this->owner instanceof SiteConfig) $before = 'Theme';
		
		if($show['Phone']) $fields->addFieldToTab("Root.Main",new TextField('Phone'), $before);
		if($show['TollFree']) $fields->addFieldToTab("Root.Main",new TextField('TollFree', 'Toll Free'), $before);
		if($show['Mobile']) $fields->addFieldToTab("Root.Main",new TextField('Mobile'), $before);
		if($show['Fax']) $fields->addFieldToTab("Root.Main",new TextField('Fax'), $before);
		if($show['Email']) $fields->addFieldToTab("Root.Main",new EmailField('Email'), $before);
		if($show['Postal']) $fields->addFieldToTab("Root.Main",new TextareaField('Postal'), $before);
		if($show['Address']) $fields->addFieldToTab("Root.Main",new TextareaField('Address'), $before);
		
		return $fields;
	}
	
	private static $show = array(
		'Address' => true,
		'Postal' => true,
		'Phone' => true,
		'TollFree' => true,
		'Mobile' => true,
		'Fax' => true,
		'Email' => true
	);
	
	public static function hide($fields) {
		foreach($fields as $field)
			self::$show[$field] = false;
	}
	
}
