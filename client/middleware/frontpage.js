export default function({ store, route, redirect }) {
  if (route.path === '/') {
    return redirect('/websites')
  }
}
