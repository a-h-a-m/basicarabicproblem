async function fetchJwb(no, jwb) {
    const id = document.getElementById('ujian').value;
    try {
        const response = await fetch(`/ujian/ajax/?no=${no}&jwb=${jwb}&id=${id}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest' // AJAX request
            }
        });
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const result = await response.text();
        console.log(result);
    } catch (error) {
        console.error("Error fetching data:", error);
        
    }
}

async function fetchWaktu(t) {
    const id = document.getElementById('ujian').value;
    try {
        const response = await fetch(`/ujian/ajax/?t=${t}&id=${id}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest' // AJAX request
            }
        });
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const result = await response.text();
        console.log(result);
    } catch (error) {
        console.error("Error fetching data:", error);
        
    }
}

function kirim_jawaban(no, jwb) {
    fetchJwb(no, jwb);
  const id = 's-' + no + '-';
  const a = document.getElementById(id + 0);
  const b = document.getElementById(id + 1);
  const c = document.getElementById(id + 2);
  const d = document.getElementById(id + 3);
  const e = document.getElementById(id + 4);
  a.innerHTML = a.innerHTML.replace(/<[^>]*>/g, '');
  b.innerHTML = b.innerHTML.replace(/<[^>]*>/g, '');
  c.innerHTML = c.innerHTML.replace(/<[^>]*>/g, '');
  d.innerHTML = d.innerHTML.replace(/<[^>]*>/g, '');
  e.innerHTML = e.innerHTML.replace(/<[^>]*>/g, '');
  
  const s = document.getElementById(id + jwb);
  s.innerHTML = '<b><u>' + s.innerHTML.replace(/<[^>]*>/g, '') + '</u></b>';
    console.log('ok');
}

function kirim_waktu(t) {
    fetchWaktu(t);
    console.log('ok');
}

function waktu() {
    const menit = document.getElementById('menit');
    const detik = document.getElementById('detik');
    let current = Number(menit.innerHTML) * 60 + Number(detik.innerHTML);
    
    function counterWaktu() {
        current--;
        if(current<0){
          document.getElementById('habis').value = 1;
          document.getElementById('end').submit();
          return;
        }
        menit.innerHTML = Math.floor(current / 60);
        detik.innerHTML = current % 60;
        kirim_waktu(current);
    }
    setInterval(counterWaktu, 1000);
}