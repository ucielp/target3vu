<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/*
|--------------------------------------------------------------------------
| Defined by me
|--------------------------------------------------------------------------
|
| These constants are defined by me
|
*/

//~ Databases and address
define('BASE_URL_UPC',   '192.168.83.41'); 			#lab
//~ define('BASE_URL_UPC',   'localhost'); 				#local
//~ define('BASE_URL_UPC',   'target3vu.uciel.com.ar'); #web

define('MIN_SPECIES',   1);
define('MAX_SPECIES',  10);
define('DEFAULT_PE','72PE');
define('SPECIES_SEPARATOR', '<br>');
define('GU_RULE', '((mm<4) OR (mm=4 AND  gu>0))');
define('DB_search','phytozome');

#define tabs
define('tabEnergy', 'mirnas');
define('tabDescription', 'functional_description');
define('tabFamily', 'gene_families');
# pfam protein domains
//~ define('tabFamily', 'gene_families_pfam');

#define table fields

//~ ############## Debería ser uno o el otro
//~ define('SIMILAR_field', 'similar1');
//~ define('SIMILAR_field', 'similar_osa');
define('SIMILAR_field', 'similar_ath');
define('FAMILY_field', 'family');
//~ Esto es solo para el mir396 que dice phyto al final
//~ define('FAMILY_field', 'family_annotation');

//~ ############## Debería ser uno o el otro

#define links
define('BEG_LINK_WMD3','http://wmd3.weigelworld.org/cgi-bin/webapp.cgi?page=TargetSearch&rm=showsequence&seq_id=');
define('END_LINK_WMD3','&transcript_library=TAIR8_cdna_20080412');

define('BEG_LINK_TAIR','http://www.arabidopsis.org/servlets/Search?type=general&search_action=detail&method=1&show_obsolete=F&name=');
define('END_LINK_TAIR','&sub_type=gene&SEARCH_EXACT=4&SEARCH_CONTAINS=1');
//~ 
//~ define('BEG_LINK_TAIR','http://rice.plantbiology.msu.edu/cgi-bin/ORF_infopage.cgi?orf=');
//~ define('END_LINK_TAIR','');



/* End of file constants.php */
/* Location: ./application/config/constants.php */
