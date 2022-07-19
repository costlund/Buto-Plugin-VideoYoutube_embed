# Buto-Plugin-VideoYoutube_embed
Embed youtube videos. Handle if using html, link or id.

## Widget embed.
This will just embed html copied from Youtube.
```
type: widget
data:
  plugin: video/youtube_embed
  method: embed
  data:
    value: '<iframe title="YouTube video player 1" src="https://www.youtube.com/embed/0aAegiZ6f5k?autoplay=0&amp;enablejsapi=1&amp;wmode=opaque" allowfullscreen="" allow="autoplay; fullscreen" name="fitvid0" id="player_1"></iframe>'
```
This will also embed the video by extracting id from Youtube link.
```
type: widget
data:
  plugin: video/youtube_embed
  method: embed
  data:
    value: 'https://youtu.be/0aAegiZ6f5k'
```
This will embed video using only id.
```
type: widget
data:
  plugin: video/youtube_embed
  method: embed
  data:
    value: '0aAegiZ6f5k'
```
