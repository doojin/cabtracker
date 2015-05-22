module.exports = function(grunt) {

    var tasks = [
        'grunt-bower-task'
    ];

    tasks.forEach(function(task) {
        grunt.loadNpmTasks(task);
    });

    grunt.initConfig({
        bower: {
            install: {
                options: {
                    cleanup: true,
                    targetDir: 'web/vendor'
                }
            }
        }
    });

    grunt.registerTask('resolve-dependencies', ['bower:install']);
};