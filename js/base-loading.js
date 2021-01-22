var _PageHeight = document.documentElement.clientHeight,
    _PageWidth = document.documentElement.clientWidth;

var _LoadingTop = _PageHeight > 61 ? (_PageHeight - 61) / 2 : 0,
    _LoadingLeft = _PageWidth > 215 ? (_PageWidth - 215) / 2 : 0;

var _LoadingHtml = '<div id="loadingDiv" style="position:absolute;left:0;width:100%;height:' + _PageHeight + 'px;top:0;background:#fff;opacity:1;filter:alpha(opacity=80);z-index:10000;"><div style="position: absolute; cursor1: wait; left: ' + _LoadingLeft + 'px; top:' + _LoadingTop + 'px; width: auto; height: 100%; line-height: 200px; padding-left: 100%; padding-right: 5px; background: #fff url(http://i.imgur.com/KUJoe.gif) no-repeat scroll 5px 10px; color: #696969; font-family:\'Arial\';">Page Loading...</div></div>';

document.write(_LoadingHtml);
 
document.onreadystatechange = completeLoading;
 
function completeLoading() {
    if (document.readyState == "complete") {
        var loadingMask = document.getElementById('loadingDiv');
        loadingMask.parentNode.removeChild(loadingMask);
    }
}