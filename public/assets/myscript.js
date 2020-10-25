const user = $('#flash-data').data('user');

if (user) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

    Toast.fire({
        icon: 'success',
        title: user,
    })
}

// STORE-SUCCESS
window.addEventListener('store-success', event => {
  const text = event.detail.message;
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

  Toast.fire({
      icon: 'success',
      title: text + ' Berhasil Diinput!',
  })
});

// EDIT-SUCCESS
window.addEventListener('edit-success', event => {
  const text = event.detail.message;
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

  Toast.fire({
      icon: 'success',
      title: text + ' Berhasil Diedit!',
  })
});

// DELETE-SUCCESS
window.addEventListener('delete-success', event => {
  const text = event.detail.message;
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

  Toast.fire({
      icon: 'success',
      title: text + ' Berhasil Dihapus!',
  })
});
