tinymce.PluginManager.add('smileys', function (editor, url) {
    var defaultSmileys = [
                        [
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/aa.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/ab.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/ac.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/ad.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/ae.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/af.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/ag.gif', title: '' },
                        ],
                        [
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/ah.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/ai.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/aj.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/ak.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/al.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/am.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/df.gif', title: '' },
                        ],
                        [
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/ao.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/ap.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/aq.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/ar.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/as.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/at.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/au.gif', title: '' },
                        ],
                        [
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/av.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/aw.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/ax.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/da.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/az.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/ba.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/dv.gif', title: '' },
                        ],
                        [
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/bc.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/bd.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/be.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/bf.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/bg.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/bh.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/bi.gif', title: '' },
                        ],
                        [
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/bm.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/bn.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/bo.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/bp.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/bq.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/db.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/dm.gif', title: '' },
                        ],
                        [
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/bt.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/bu.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/bv.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/bw.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/bx.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/by.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/bz.gif', title: '' },
                        ],
                        [
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/ca.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/cb.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/cd.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/dk.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/cf.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/dn.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/ch.gif', title: '' },
                        ],
                        [
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/ci.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/cj.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/dr.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/du.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/cm.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/cn.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/co.gif', title: '' },
                        ],
                        [
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/cp.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/cw.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/cy.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/cs.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/ct.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/cz.gif', title: '' },
                            { shortcut: '', url: 'http://forum.lalipop.ru/images/forum/smile/dh.gif', title: '' },
                        ],
    ];

    var smileys = editor.settings.smileys || defaultSmileys, fullSmileysList = editor.settings.extended_smileys ? smileys.concat(editor.settings.extended_smileys) : smileys;

    function getHtml() {
        var smileysHtml;

        smileysHtml = '<table role="presentation" class="">';

        tinymce.each(fullSmileysList, function (row) {
            smileysHtml += '<tr>';

            tinymce.each(row, function (icon) {
                smileysHtml += '<td style="vertical-align:middle;text-align:center"><a href="#" style="text-align:center;" data-mce-url="' + icon.url + '" tabindex="-1" title="' + icon.title + '"><img src="' +
                    icon.url + '" style=""></a></td>';
            });

            smileysHtml += '</tr>';
        });

        smileysHtml += '</table>';

        return smileysHtml;
    }

    function concatArray(array) {
        var each = tinymce.each, result = [];
        each(array, function (item) {
            result = result.concat(item);
        });
        return result.length > 0 ? result : array;
    }

    function findAndReplaceDOMText(regex, node, replacementNode, captureGroup, schema) {
        var m, matches = [], text, count = 0, doc;
        var blockElementsMap, hiddenTextElementsMap, shortEndedElementsMap;

        doc = node.ownerDocument;
        blockElementsMap = schema.getBlockElements(); // H1-H6, P, TD etc
        hiddenTextElementsMap = schema.getWhiteSpaceElements(); // TEXTAREA, PRE, STYLE, SCRIPT
        shortEndedElementsMap = schema.getShortEndedElements(); // BR, IMG, INPUT

        function getMatchIndexes(m, captureGroup) {
            captureGroup = captureGroup || 0;

            var index = m.index;

            if (captureGroup > 0) {
                var cg = m[captureGroup];
                index += m[0].indexOf(cg);
                m[0] = cg;
            }

            return [index, index + m[0].length, [m[0]]];
        }

        function getText(node) {
            var txt;

            if (node.nodeType === 3) {
                return node.data;
            }

            if (hiddenTextElementsMap[node.nodeName] && !blockElementsMap[node.nodeName]) {
                return '';
            }

            txt = '';

            if (blockElementsMap[node.nodeName] || shortEndedElementsMap[node.nodeName]) {
                txt += '\n';
            }

            if ((node = node.firstChild)) {
                do {
                    txt += getText(node);
                } while ((node = node.nextSibling));
            }

            return txt;
        }

        function stepThroughMatches(node, matches, replaceFn) {
            var startNode, endNode, startNodeIndex,
                endNodeIndex, innerNodes = [], atIndex = 0, curNode = node,
                matchLocation = matches.shift(), matchIndex = 0;

            out: while (true) {
                if (blockElementsMap[curNode.nodeName] || shortEndedElementsMap[curNode.nodeName]) {
                    atIndex++;
                }

                if (curNode.nodeType === 3) {
                    if (!endNode && curNode.length + atIndex >= matchLocation[1]) {
                        // We've found the ending
                        endNode = curNode;
                        endNodeIndex = matchLocation[1] - atIndex;
                    } else if (startNode) {
                        // Intersecting node
                        innerNodes.push(curNode);
                    }

                    if (!startNode && curNode.length + atIndex > matchLocation[0]) {
                        // We've found the match start
                        startNode = curNode;
                        startNodeIndex = matchLocation[0] - atIndex;
                    }

                    atIndex += curNode.length;
                }

                if (startNode && endNode) {
                    curNode = replaceFn({
                        startNode: startNode,
                        startNodeIndex: startNodeIndex,
                        endNode: endNode,
                        endNodeIndex: endNodeIndex,
                        innerNodes: innerNodes,
                        match: matchLocation[2],
                        matchIndex: matchIndex
                    });

                    // replaceFn has to return the node that replaced the endNode
                    // and then we step back so we can continue from the end of the
                    // match:
                    atIndex -= (endNode.length - endNodeIndex);
                    startNode = null;
                    endNode = null;
                    innerNodes = [];
                    matchLocation = matches.shift();
                    matchIndex++;

                    if (!matchLocation) {
                        break; // no more matches
                    }
                } else if ((!hiddenTextElementsMap[curNode.nodeName] || blockElementsMap[curNode.nodeName]) && curNode.firstChild) {
                    // Move down
                    curNode = curNode.firstChild;
                    continue;
                } else if (curNode.nextSibling) {
                    // Move forward:
                    curNode = curNode.nextSibling;
                    continue;
                }

                // Move forward or up:
                while (true) {
                    if (curNode.nextSibling) {
                        curNode = curNode.nextSibling;
                        break;
                    } else if (curNode.parentNode !== node) {
                        curNode = curNode.parentNode;
                    } else {
                        break out;
                    }
                }
            }
        }

        /**
        * Generates the actual replaceFn which splits up text nodes
        * and inserts the replacement element.
        */
        function genReplacer(nodeName) {
            var makeReplacementNode;

            if (typeof nodeName != 'function') {
                var stencilNode = nodeName.nodeType ? nodeName : doc.createElement(nodeName);

                makeReplacementNode = function () {
                    var clone = stencilNode.cloneNode(false);
                    return clone;
                };
            } else {
                makeReplacementNode = nodeName;
            }

            return function replace(range) {
                var before, after, parentNode, startNode = range.startNode,
                    endNode = range.endNode;

                if (startNode === endNode) {
                    var node = startNode;

                    parentNode = node.parentNode;
                    if (range.startNodeIndex > 0) {
                        // Add `before` text node (before the match)
                        before = doc.createTextNode(node.data.substring(0, range.startNodeIndex));
                        parentNode.insertBefore(before, node);
                    }

                    // Create the replacement node:
                    var el = makeReplacementNode();
                    parentNode.insertBefore(el, node);
                    if (range.endNodeIndex < node.length) {
                        // Add `after` text node (after the match)
                        after = doc.createTextNode(node.data.substring(range.endNodeIndex));
                        parentNode.insertBefore(after, node);
                    }

                    node.parentNode.removeChild(node);

                    return el;
                }
            };
        }

        text = getText(node);
        if (!text) {
            return;
        }
        while ((m = regex.exec(text))) {
            matches.push(getMatchIndexes(m, captureGroup));
        }

        if (matches.length) {
            count = matches.length;
            stepThroughMatches(node, matches, genReplacer(replacementNode));
        }

        return count;
    }

    function replaceAllMatches(smiley) {
        var each = tinymce.each, node = editor.selection.getNode(), marker, text;
        if (typeof (smiley.shortcut) === 'string') {
            text = smiley.shortcut.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");

            marker = editor.dom.create('img', { "src": smiley.url, "title": smiley.title });

            return findAndReplaceDOMText(new RegExp(text, 'gi'), node, marker, false, editor.schema);
        }
        else if (Array.isArray(smiley.shortcut)) {
            each(smiley.shortcut, function(item) {

                marker = editor.dom.create('img', { "src": smiley.url, "title": smiley.title });

                return findAndReplaceDOMText(new RegExp(item.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&"), 'gi'), node, marker, false, editor.schema);
            });
        }
    }

    editor.on("keyup", function (e) {
        if (!!editor.settings.auto_convert_smileys) {
            var each = tinymce.each, selection = editor.selection, node = selection.getNode();
            if (node) {
                each(concatArray(fullSmileysList), function (smiley) {
                    replaceAllMatches(smiley);
                });
            }
        }
    });

    editor.addButton('smileys', {
        type: 'panelbutton',
        icon: 'emoticons',
        panel: {
            autohide: true,
            html: getHtml,
            onclick: function (e) {
                var linkElm = editor.dom.getParent(e.target, 'a');

                if (linkElm) {
                    editor.insertContent('<img src="' + linkElm.getAttribute('data-mce-url') + '" title="' + linkElm.getAttribute('title') + '" />');
                    this.hide();
                }
            }
        },
        tooltip: 'Смайлики'
    });
});
