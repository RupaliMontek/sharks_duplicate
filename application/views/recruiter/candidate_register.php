<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How to record a video with JavaScript</title>
  </head>
  <body>
    <div>
      <button type="button" id="buttonStart">Start</button>
      <button type="button" id="buttonStop" disabled>Stop</button>
    </div>
    <div>
      <video autoplay muted playsinline id="videoLive"></video>
    </div>
    <div>
      <video controls playsinline id="videoRecorded"></video>
    </div>
<script>
async function main () {
  const buttonStart = document.querySelector('#buttonStart')
  const buttonStop = document.querySelector('#buttonStop')
  const videoLive = document.querySelector('#videoLive')
  const videoRecorded = document.querySelector('#videoRecorded')

  const stream = await navigator.mediaDevices.getUserMedia({ // <1>
    video: true,
    audio: true,
  })

  videoLive.srcObject = stream

  if (!MediaRecorder.isTypeSupported('video/webm')) { // <2>
    console.warn('video/webm is not supported')
  }

  const mediaRecorder = new MediaRecorder(stream, { // <3>
    mimeType: 'video/webm',
  })

  buttonStart.addEventListener('click', () => {
    mediaRecorder.start() // <4>
    buttonStart.setAttribute('disabled', '')
    buttonStop.removeAttribute('disabled')
  })

  buttonStop.addEventListener('click', () => {
    mediaRecorder.stop() // <5>
    buttonStart.removeAttribute('disabled')
    buttonStop.setAttribute('disabled', '')
  })

  mediaRecorder.addEventListener('dataavailable', event => {
    videoRecorded.src = URL.createObjectURL(event.data) // <6>
  })
}

main()
</script>  


</body>
</html>