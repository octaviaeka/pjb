var frame = $('#Editor1_ctl02_ctl00').contents().find('body');
frame.html('tempatkan kursor')

/**/

var frameID  = 'Editor1_ctl02_ctl00',
    selectID = 'imgDropdown',
    iframe   = document.getElementById(frameID),
    iWin     = iframe.contentWindow ? iframe.contentWindow : window.frames[frameID],
    iDoc     = iframe.contentDocument ? iframe.contentDocument : (iframe.contentWindow ? iframe.contentWindow.document : iframe.document);

iDoc.designMode = 'on'; // for demo, sets the iframe to designMode, same as MS toolkit

$(iDoc).ready(function() {
    $(iWin).on('blur', function() {
        $(iframe).data('range', getRange(iWin));
    });
});

$('#' + selectID).on('change', function() {
    var range = $(iframe).data('range');
    addText(iWin, range, this.value);
});


function getRange(win) {
    var sel, range, html;
    if (win.getSelection) {
        sel = win.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            range = sel.getRangeAt(0);
            range.deleteContents();
        }
    } else if (win.document.selection && win.document.selection.createRange) {
        range = win.document.selection.createRange();
    }
    return range;
}

function addText(win, range, text) {
    if (win.getSelection) {
       range.insertNode(win.document.createTextNode(text));
    } else if (win.document.selection && win.document.selection.createRange) {
        range.text = text;
    }
}