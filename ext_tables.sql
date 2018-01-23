#
# Table structure for table 'tx_play_domain_model_example'
#
CREATE TABLE tx_play_domain_model_example (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	description varchar(255) DEFAULT '' NOT NULL,
	state int(11) DEFAULT '0' NOT NULL,
	type int(11) unsigned DEFAULT '0',
  properties INT(11) UNSIGNED DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,
	hidden smallint(5) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_play_domain_model_exampletype'
#
CREATE TABLE tx_play_domain_model_exampletype (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,
	hidden smallint(5) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_play_domain_model_exampleproperties'
#
CREATE TABLE tx_play_domain_model_exampleproperties (

  uid              INT(11)                          NOT NULL AUTO_INCREMENT,
  pid              INT(11) DEFAULT '0'              NOT NULL,

  example          INT(11) UNSIGNED DEFAULT '0'     NOT NULL,

  title            VARCHAR(255) DEFAULT ''          NOT NULL,
  value            VARCHAR(255) DEFAULT ''          NOT NULL,

  tstamp           INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  crdate           INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  cruser_id        INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  deleted          SMALLINT(5) UNSIGNED DEFAULT '0' NOT NULL,
  hidden           SMALLINT(5) UNSIGNED DEFAULT '0' NOT NULL,
  starttime        INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  endtime          INT(11) UNSIGNED DEFAULT '0'     NOT NULL,

  t3ver_oid        INT(11) DEFAULT '0'              NOT NULL,
  t3ver_id         INT(11) DEFAULT '0'              NOT NULL,
  t3ver_wsid       INT(11) DEFAULT '0'              NOT NULL,
  t3ver_label      VARCHAR(255) DEFAULT ''          NOT NULL,
  t3ver_state      SMALLINT(6) DEFAULT '0'          NOT NULL,
  t3ver_stage      INT(11) DEFAULT '0'              NOT NULL,
  t3ver_count      INT(11) DEFAULT '0'              NOT NULL,
  t3ver_tstamp     INT(11) DEFAULT '0'              NOT NULL,
  t3ver_move_id    INT(11) DEFAULT '0'              NOT NULL,
  sorting          INT(11) DEFAULT '0'              NOT NULL,

  sys_language_uid INT(11) DEFAULT '0'              NOT NULL,
  l10n_parent      INT(11) DEFAULT '0'              NOT NULL,
  l10n_diffsource  MEDIUMBLOB,
  l10n_state       TEXT,

  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY t3ver_oid (t3ver_oid, t3ver_wsid),
  KEY language (l10n_parent, sys_language_uid)

);