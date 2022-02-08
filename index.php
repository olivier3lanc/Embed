<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>URL to Markdown</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Transform a list of URL into a markdown list of title and description links">
        <link rel="stylesheet" href="https://fonts.xz.style/serve/inter.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@exampledev/new.css@1.1.2/new.min.css">
    </head>
    <body>
        <header>
            <h1>URL to Markdown</h1>
            <p>Transform a list of URL into a markdown list of title and description links</p>
        </header>
        <main>
            
            <label for="links">Paste one link per line</label><br>
            <textarea id="links" rows="10" style="width: 100%;"></textarea>
            <nav><button id="run">Run</button></nav>
            
            <p id="progress">Progress: <span id="progress_done">-</span>/<span id="progress_total">-</span></p>
            <textarea id="results" rows="10" style="width: 100%; font-family: monospace;"></textarea>
        </main>

        <script>
            const app = {
                elements: {
                    links: document.getElementById('links'),
                    run: document.getElementById('run'),
                    results: document.getElementById('results'),
                    progress: document.getElementById('progress'),
                    progress_done: document.getElementById('progress_done'),
                    progress_total: document.getElementById('progress_total')
                },
                update: function() {
                    this.elements.run.addEventListener('click', function() {

                        app.elements.progress.style.color = '';
                        app.elements.results.innerHTML = '';
                        app.elements.progress_done.innerHTML = '-';
                        const links_array = app.elements.links.value.split(/\r?\n/);
                        const links_count = links_array.length;
                        app.elements.progress_total.innerHTML = links_count;
                        window.i = 1;
                        links_array.forEach(function(link) {
                            fetch('api.php?link='+link).then(function (response) {
                                // The API call was successful!
                                return response.text();
                            }).then(function (html) {
                                // const result = JSON.parse(html);
                                
                                const title = html.split('____:')[0];
                                const description = html.split('____:')[1];
                                // console.log(title,description);
                                const markdown = '* ['+title+']('+link+') '+description+'\r\n';
                                app.elements.results.insertAdjacentHTML('beforeend', markdown);
                                app.elements.progress.style.color = 'orange';
                                app.elements.progress_done.innerHTML = i;
                                if (i == links_count) {
                                    // console.log('Completed');
                                    app.elements.progress.style.color = 'green';
                                } else {
                                    i++;
                                }
                            }).catch(function (err) {
                                // There was an error
                                console.warn('Something went wrong.', err);
                            });
                        })
                    });
                }
            }
            app.update();

        </script>
    </body>
</html>
