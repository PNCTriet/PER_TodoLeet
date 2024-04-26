function updateRealtimeClock() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var timeString = formatTime(hours) + ':' + formatTime(minutes) + ':' + formatTime(seconds);
    document.getElementById('realtime-clock').innerText = timeString;
}

function formatTime(time) {
    return (time < 10 ? '0' : '') + time;
}

// Cập nhật đồng hồ mỗi giây
setInterval(updateRealtimeClock, 1000);
