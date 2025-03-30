<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($subject); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        .ticket {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
        }
        .ticket-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .ticket-header h1 {
            margin: 0;
            color: #1e90ff;
        }
        .movie-info, .seat-info, .date-info {
            margin-bottom: 15px;
        }
        .movie-info h3, .seat-info h3, .date-info h3 {
            margin: 0;
            color: #333;
        }
        .ticket-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="ticket-header">
            <h1><?php echo e($subject); ?></h1>
            <p><?php echo e($message); ?></p>
        </div>

        <!-- Movie Information -->
        <div class="movie-info">
            <h3>Película:</h3>
            <p><strong><?php echo e($movieData['title']); ?></strong></p>
            <p><strong>Género:</strong> <?php echo e($movieData['genre']); ?></p>
            <p><strong>Sinopsis:</strong> <?php echo e($movieData['synopsis']); ?></p>
        </div>

        <!-- Seat Information -->
        <div class="seat-info">
            <h3>Asientos:</h3>
            <ul>
                <?php $__currentLoopData = $ticketDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>Asiento: <?php echo e($seat); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>

        <!-- Date Information -->
        <div class="date-info">
            <h3>Fecha de la película:</h3>
            <p><?php echo e(\Carbon\Carbon::parse($movieData['date'])->format('d/m/Y H:i')); ?></p>
        </div>

        <!-- Footer -->
        <div class="ticket-footer">
            <p>¡Gracias por elegir TaquillaXpress!</p>
        </div>
    </div>
</body>
</html><?php /**PATH /var/www/resources/views/tickets.blade.php ENDPATH**/ ?>