<OBJECT classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921"
        codebase="http://downloads.videolan.org/pub/videolan/vlc/latest/win32/axvlc.cab"
        width="480" height="360" id="vlc" events="True">
    <param name="Src" value="http://{$ns.copter->getIp()}:8080/" />
    <param name="ShowDisplay" value="True" />
    <param name="AutoLoop" value="False" />
    <param name="AutoPlay" value="True" />
    <embed id="vlcEmb" type="application/x-google-vlc-plugin" version="VideoLAN.VLCPlugin.2" autoplay="yes" loop="no" width="480" height="360"
           target="http://{$ns.copter->getIp()}:8080" >
    </embed>
</OBJECT>