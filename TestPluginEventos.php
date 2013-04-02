<?php
// Restringe el Acceso al archivo si no es desde el Entorno Joomla.
defined('_JEXEC') or die;

/**
 * Plugin test de Eventos.
 */

class plgContentTestPluginEventos extends JPlugin
{
	private $_titulo = '<h3 style="color: %s">%s</h3>';

/**
 * Constructor del objeto
 * 
 * @param object &$subject es una instancia del objeto a construir
 * @param array $config parámetro opcional arreglo asociativo: puede contener las claves
 *                      'name', 'group', 'params', 'language'
 */
	public function __construct(&$subject, $config)
	{
		parent::__construct($subject, $config);
	}//fin constructor

/**
 * Esta función es ejecutada antes de renderizar el articulo
 *
 * @param String $context es el contexto en el cual es ejecutada
 * @param Object $row es un objeto que contiene la información del articulo(como titulo, contenido, url, autor, etc)
 * @param Object $params es un objeto que contiene la información del portal y parametros del plugin
 * @param Integer $limitstart desplazamiento del elemento
 */
	public function onContentPrepare($context, &$row, &$params, $limitstart)
	{
		if($context == 'com_content.article')
			$row->text = '<p>Contenido modificado en <b>onContentPrepare</b></p>' . $row->text;
	}//fin onContentPrepare


/**
 * Esta función es ejecutada antes de mostrar renderizar el cuerpo del articulo
 *
 * @param String $context es el contexto en el cual es ejecutada
 * @param Object $row es un objeto que contiene la información del articulo(como contenido, url, autor, etc)
 * @param Object $params es un objeto que contiene la información del portal y parametros del plugin
 * @param Integer $limitstart desplazamiento del elemento
 */
	public function onContentBeforeDisplay($context, &$row, &$params, $limitstart)
	{
		return sprintf($this->_titulo, '#FF4A00', 'Acción onContentBeforeDisplay');
	}//fin onContentBeforeDisplay

/**
 * Esta función es ejecutada despues de mostrar renderizar el cuerpo del articulo
 *
 * @param String $context es el contexto en el cual es ejecutada
 * @param Object $row es un objeto que contiene la información del articulo(como contenido, url, autor, etc)
 * @param Object $params es un objeto que contiene la información del portal y parametros del plugin
 * @param Integer $limitstart desplazamiento del elemento
 */
	public function onContentAfterDisplay($context, &$row, &$params, $limitstart)
	{
			return sprintf($this->_titulo, '#1C9202', 'Acción onContentAfterDisplay');
	}//fin onContentAfterDisplay

}
