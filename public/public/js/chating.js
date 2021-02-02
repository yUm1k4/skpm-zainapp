var chat_realtime = function (j, k, l, m, n, pengaduan_id, user_id, pengaduan_id) {

    //send chat
    document.querySelector('#send').addEventListener("click", function(h) {
        var a = new Date(),
            b = a.getDate(),
            c = (a.getMonth() + 1),
            d = a.getFullYear(),
            e = a.getHours(),
            f = a.getMinutes(),
            g = a.getSeconds(),
            date = d + '-' + (c < 10 ? '0' + c : c) + '-' + (b < 10 ? '0' + b : b) + ' ' + (e < 10 ? '0' + e : e) + ':' + (f < 10 ? '0' + f : f) + ':' + (g < 10 ? '0' + g : g);
        h.preventDefault();
        if (document.querySelector('#message').value != '') {
            var i = {
                // data: 'send',
                // name: m,
                // ke: uKe,
                // avatar: n,
                // message: document.querySelector('#message').value,
                // tipe: uTipe,
                // date: date
                data: 'send',
                pengaduan_id: pengaduan_id,
                user_id: user_id,
                petugas_id: petugas_id,
                percakapan: document.querySelector('#message').value,
                date: date
            };
			
			// push firebase
            k.push(i);
			
			// insert mysql
            $.ajax({
                url: l,
                type: "post",
                data: i,
                crossDomain: true
            });
            document.querySelector('#message').value = '';
			// document.querySelector('.emoji-wysiwyg-editor').innerHTML = '';
        } else {
            alert('Please fill atlease message!')
        }
    }, false);



    function htmlEntities(a) {
        return String(a).replace(/</g, '&lt;').replace(/>/g, '&gt;')
    }

    function timing(a) {
        var s = Math.floor((new Date() - a) / 1000),
            i = Math.floor(s / 31536000);
        if (i > 1) {
            return i + " yrs ago"
        }
        i = Math.floor(s / 2592000);
        if (i > 1) {
            return i + " mon ago"
        }
        i = Math.floor(s / 86400);
        if (i > 1) {
            return i + " dys ago"
        }
        i = Math.floor(s / 3600);
        if (i > 1) {
            return i + " hrs ago"
        }
        i = Math.floor(s / 60);
        if (i > 1) {
            return i + " min ago"
        }
        return (Math.floor(s) > 0 ? Math.floor(s) + " sec ago" : "just now")
    }
}