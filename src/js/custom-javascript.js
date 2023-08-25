// Add your custom JS here.

AOS.init({
  duration: 2000,
  once: true,
});

(function($){

  function labnolIframe(div) {
    var iframe = document.createElement('iframe');
    iframe.setAttribute('src', 'https://www.youtube.com/embed/' + div.dataset.id + '?autoplay=1&amp;feature=oembed');
    iframe.setAttribute('frameborder', '0');
    iframe.setAttribute('allowfullscreen', '1');
    iframe.setAttribute('allow', 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture');
    div.parentNode.replaceChild(iframe, div);
  }

  function initYouTubeVideos() {
    var playerElements = document.querySelectorAll('.youtube-player');
    for (var n = 0; n < playerElements.length; n++) {
        var videoId = playerElements[n].dataset.id;
        var div = document.createElement('div');
        div.setAttribute('data-id', videoId);
        var thumbNode = document.createElement('img');
        if (playerElements[n].dataset.thumb !== '') {
            thumbNode.src = playerElements[n].dataset.thumb;
        } else {
            thumbNode.src = '//i.ytimg.com/vi/ID/hqdefault.jpg'.replace('ID', videoId);
        }
        div.appendChild(thumbNode);
        if (playerElements[n].dataset.play !== '') {
          var playButton = document.createElement('div');
          playButton.setAttribute('class', 'play');
          div.appendChild(playButton);
        }
        div.onclick = function() {
            labnolIframe(this);
        };
        playerElements[n].appendChild(div);
    }
  }

  document.addEventListener('DOMContentLoaded', initYouTubeVideos);

})(jQuery);
