<?php 

/**
 * Convert xml to array format.
 * 
 * @param $xmldata
 * @return array
 */
function parseXmlToArray($xmldata)
{
	$xmlparser = xml_parser_create();

	xml_parse_into_struct($xmlparser, $xmldata, $values);
	xml_parser_free($xmlparser);

	return $values;
}
