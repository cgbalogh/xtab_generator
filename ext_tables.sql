#
# Table structure for table 'tx_xtabgenerator_domain_model_xtab'
#
CREATE TABLE tx_xtabgenerator_domain_model_xtab (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,
	description text,
	aggregate_object varchar(255) DEFAULT '' NOT NULL,
	detail_object varchar(255) DEFAULT '' NOT NULL,
	template varchar(255) DEFAULT '' NOT NULL,
	rowheader text,
	colheader text,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),

);
