childs = document.getElementById('main_catalog').childNodes;

var preload = new Array();
var preload_s = new Array();

for (var key in childs) {
    var child = childs [key];
    if (child.nodeName == 'DIV') {
        div_childs = child.childNodes;
        for (var div_key in div_childs) {
            var div_child = div_childs[div_key];

            if (div_child.nodeName == 'A') {
                a_childs = div_child.childNodes;
                for (var a_key in a_childs) {
                    var a_child = a_childs [a_key];
                    if (a_child.nodeName == 'IMG') {
                        var src = a_child.getAttribute('src').replace('.png', '');
                        preload['img_'+src] = new Image();
                        preload['img_'+src].src = src + '.png';
                        preload_s['img_'+src] = new Image();
                        preload_s['img_'+src].src = src + '_s.png';
                        a_child.setAttribute('id','img_'+src)

                        a_child.onmouseover = function () {
                            document.getElementById(this.getAttribute('id')).src = preload_s[this.getAttribute('id')].src;
                        };
                        a_child.onmouseout = function () {
                            document.getElementById(this.getAttribute('id')).src = preload[this.getAttribute('id')].src;
                        };
                    }
                }
            }
        }
    }
}