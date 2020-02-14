panel.plugin('medienbaecker/history', {
	sections: {
	  history: {
		data: function () {
			return {
				headline: null,
				latestPages: []
			}
		},
		created: function() {
			this.load().then(response => {
				this.headline = response.headline;
				this.latestPages = response.latestPages;
			});
		},
		template: `
			<section class="k-history-section">
				<header class="k-section-header">
					<h2 class="k-headline">{{ headline }}</h2>
				</header>
				<div class="latest-pages">
					<a v-for="page in latestPages" :href="page.link">{{ page.title }}</a>
				</div>
			</section>
		`
	  }
	}
  });