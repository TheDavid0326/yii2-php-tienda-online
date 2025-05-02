<?php

// Función que hará el reemplazo de rutas relativas de /../../dist a Yii::getAlias('@web/dist')
function replaceAssetUrls($htmlContent)
{
    $htmlContent = preg_replace('/\.\.\/\.\.\/dist/', Yii::getAlias('@web/dist'), $htmlContent);
    
    return $htmlContent;
}

// Cargar el contenido de index.html de AdminLTE
$htmlContent = file_get_contents(Yii::getAlias('@webroot/dist/pages/index.html'));

// Reemplazar las rutas relativas con rutas absolutas
$htmlContent = replaceAssetUrls($htmlContent);

// Reemplazar el contenido de la sección <!-- yii-content --> por el contenido de la vista actual
$htmlContent = str_replace('<!-- yii-content -->', $content, $htmlContent);

echo $htmlContent;
?>

