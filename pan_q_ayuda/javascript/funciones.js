function toastShow(){
  let type = TYPES[Math.floor(Math.random() * TYPES.length)],
      title = TITLES[type],
      content = CONTENT[type];

  $.toast({
    title: title,
    subtitle: '11 mins ago',
    content: content,
    type: type,
    delay: 5000
  });
}