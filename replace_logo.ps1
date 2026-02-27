$htmlPath = 'c:\Users\JamesMorris\OneDrive - Echo-9\Development Projects\html_templates\glpi_template.html'
$b64Path = 'c:\Users\JamesMorris\OneDrive - Echo-9\Development Projects\html_templates\logo_b64.txt'
$html = Get-Content -Path $htmlPath -Raw
$b64 = Get-Content -Path $b64Path -Raw

$startStr = "<!-- Logo Placeholder - Will be replaced with Base64 Image -->"
$endStr = "<!-- START HEADER -->"

$startIndex = $html.IndexOf($startStr)
$endIndex = $html.IndexOf($endStr)

if ($startIndex -ge 0 -and $endIndex -gt $startIndex) {
    $before = $html.Substring(0, $startIndex + $startStr.Length)
    $after = $html.Substring($endIndex)
    
    $newImg = "`r`n                                    <img src=`"data:image/png;base64,$b64`" style=`"width: 240px; height: 114px; margin-bottom: 0px; display: block;`" width=`"240`" height=`"114`" alt=`"Logo`" />`r`n                                    "
    
    $newHtml = $before + $newImg + $after
    Set-Content -Path $htmlPath -Value $newHtml -Encoding UTF8
    Write-Output "Replacement successful"
}
else {
    Write-Output "Tags not found"
}
