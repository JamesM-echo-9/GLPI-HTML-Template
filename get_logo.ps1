Add-Type -AssemblyName System.Drawing
$imgPath = "c:\Users\JamesMorris\OneDrive - Echo-9\Development Projects\html_templates\E9-logo.png"
$img = [System.Drawing.Image]::FromFile($imgPath)
Write-Output "Width: $($img.Width), Height: $($img.Height)"
$img.Dispose()

$bytes = [System.IO.File]::ReadAllBytes($imgPath)
$b64 = [System.Convert]::ToBase64String($bytes)
$b64 | Out-File -FilePath "c:\Users\JamesMorris\OneDrive - Echo-9\Development Projects\html_templates\logo_b64.txt" -Encoding ascii
