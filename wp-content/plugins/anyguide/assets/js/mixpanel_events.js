// Track Visits
mixpanel.track('WPBE - visit', {
  'page name' : document.title
});

// Clicked new Snippet
mixpanel.track_links("#trackNewSnippet", "WPBE - new snippet", {
  "referrer": document.referrer
});

// Clicked to Visit Support
mixpanel.track_links("#trackVisitSupport", "WPBE - visit support", {
  "referrer": document.referrer
});

// Clicked to Chat on Olark
mixpanel.track_links("#trackOlarkChat", "WPBE - olark chat", {
  "referrer": document.referrer
});

// Clicked Help in Navbar
mixpanel.track_links("#trackHelpNav", "WPBE - Help - Nav", {
  "referrer": document.referrer
});

// Subscribed to Mailchimp
mixpanel.track_forms('#mc-embedded-subscribe-form', 'WPBE - Mailchimp Form')

// Created new Snippet
// mixpanel.track_links("#trackCreateSnippet", "WPBE - create snippet", {
//   "referrer": document.referrer
// });